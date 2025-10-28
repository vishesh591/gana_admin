<?php

namespace App\Controllers\Backend\Release;

use App\Controllers\BaseController;
use App\Repositories\Releases\ReleaseRepository;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Backend\LabelModel;
use App\Models\Backend\ArtistModel;
use App\Models\Backend\GenreModel;
use App\Models\Backend\LanguageModel;
use App\Models\Backend\ReleaseModel;

class ReleaseController extends BaseController
{
    protected $releaseRepo;

    public function __construct()
    {
        $this->releaseRepo = new ReleaseRepository();
    }

    /**
     * Get labels based on user's primary_label_name
     */
    private function getLabelsForUser($userId, $userPrimaryLabel)
    {
        $labelModel = new LabelModel();

        if (!$userPrimaryLabel) {
            return [];
        }

        // Get all labels where primary_label_name matches user's primary_label_name and status is active (2)
        $labels = $labelModel->where('primary_label_name', $userPrimaryLabel)->where('status', 2)->findAll();

        return $labels;
    }

    public function index()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;
        $userPrimaryLabel = $user['primary_label_name'] ?? null;

        if (in_array($userRole, [1, 2])) {
            $releaseCounts = $this->releaseRepo->countAllData();
        } else {
            $releaseCounts = $this->releaseRepo->countAllData($userId, $userPrimaryLabel);
        }

        if ($this->request->isAJAX()) {
            if (in_array($userRole, [1, 2])) {
                $releases = $this->releaseRepo->findAll();
            } else {
                $releases = $this->releaseRepo->findAllVisibleToUser($userId, $userPrimaryLabel);
            }

            $statusMap = [
                1 => 'review',
                2 => 'takedown',
                3 => 'delivered',
                4 => 'rejected',
                5 => 'approved',
                6 => 'takedown_requested'
            ];

            $artistModel = new ArtistModel();

            $releasesData = array_map(function ($r) use ($statusMap, $artistModel) {
                $artist = $artistModel->find($r['artist_id']);
                $artistName = $artist ? $artist['name'] : $r['author'];
                return [
                    'id' => $r['id'],
                    'title' => $r['title'],
                    'artist' => $artistName,
                    'submittedDate' => date('jS F Y', strtotime($r['created_at'])),
                    'upc' => $r['upc_ean'],
                    'isrc' => $r['isrc'],
                    'status' => $statusMap[$r['status']] ?? 'review',
                    'status_numeric' => $r['status'],
                    'albumArtwork' => '/images/rocket.png',
                    'rejectionMessage' => $r['message'] ?? ''
                ];
            }, $releases);

            return $this->response->setJSON(['data' => $releasesData]);
        }

        $page_array = [
            'file_name' => 'releases',
            'releaseCounts' => $releaseCounts,
        ];
        return view('superadmin/index', $page_array);
    }

    public function getRejectionMessages($releaseId)
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        try {
            $release = $this->releaseRepo->find($releaseId);

            if (!$release) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'Release not found'
                ]);
            }

            $messages = [];
            if (!empty($release['message'])) {
                $messages[] = [
                    'message' => $release['message'],
                    'created_at' => $release['updated_at'],
                    'admin_name' => 'Admin'
                ];
            }

            return $this->response->setJSON([
                'success' => true,
                'messages' => $messages
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error getting rejection messages: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Failed to load rejection messages'
            ]);
        }
    }

    public function edit($id)
    {
        $session = session();
        $user = $session->get('user');

        $release = $this->releaseRepo->find($id);

        if (!$release) {
            throw new PageNotFoundException('Release not found');
        }

        // For non-admin users, allow editing ONLY if status is rejected (4)
        $isAdmin = in_array($user['role_id'], [1, 2]);
        if (!$isAdmin && $release['status'] != 4) {
            return redirect()->to("/releases/view/{$id}");
        }

        $labelModel = new LabelModel();
        $artistModel = new ArtistModel();
        $genreModel = new GenreModel();
        $languageModel = new LanguageModel();

        if ($isAdmin) {
            // Admin/Superadmin: all labels and all artists
            $labels = $labelModel->where('status', 2)->findAll();
            $artists = $artistModel->findAll();
        } else {
            // Non-admin: labels based on primary_label_name match
            $userPrimaryLabel = $user['primary_label_name'] ?? null;
            $labels = $this->getLabelsForUser($user['id'], $userPrimaryLabel);

            if ($userPrimaryLabel) {
                $artists = $artistModel->where('label_name', $userPrimaryLabel)->findAll();
            } else {
                $artists = [];
            }
        }

        $genres = $genreModel->findAll();
        $languages = $languageModel->findAll();

        // Decode JSON fields properly
        if (!empty($release['stores_ids'])) {
            $storesDecoded = json_decode($release['stores_ids'], true);
            if (is_array($storesDecoded) && isset($storesDecoded[0]) && is_array($storesDecoded[0])) {
                $release['stores'] = $storesDecoded[0];
            } else {
                $release['stores'] = $storesDecoded ?? [];
            }
        } else {
            $release['stores'] = [];
        }

        if (!empty($release['rights_management_options'])) {
            $rightsDecoded = json_decode($release['rights_management_options'], true);
            if (is_array($rightsDecoded) && isset($rightsDecoded[0]) && is_array($rightsDecoded[0])) {
                $release['rights'] = $rightsDecoded[0];
            } else {
                $release['rights'] = $rightsDecoded ?? [];
            }
        } else {
            $release['rights'] = [];
        }

        $page_array = [
            'file_name'      => 'add-release',
            'user'           => $user,
            'labels'         => $labels,
            'release'        => $release,
            'isEdit'         => true,
            'artists'        => $artists,
            'genres'         => $genres,
            'languages'      => $languages
        ];

        return view('superadmin/index', $page_array);
    }

    public function create()
    {
        return view('superadmin/releases/create');
    }

    // Add this method to your ReleaseController

    public function validateUnique()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON([
                'success' => false,
                'error' => 'Invalid request'
            ]);
        }

        $field = $this->request->getGet('field');
        $value = $this->request->getGet('value');
        $releaseId = $this->request->getGet('release_id');

        if (!$field || !$value) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Missing required parameters'
            ]);
        }

        // Map frontend field names to database column names
        $fieldMap = [
            'upcEan' => 'upc_ean',
            'isrc' => 'isrc'
        ];

        $dbField = $fieldMap[$field] ?? $field;

        try {
            $releaseModel = new ReleaseModel();
            $builder = $releaseModel->where($dbField, $value);

            // Exclude current release in edit mode
            if ($releaseId) {
                $builder->where('id !=', $releaseId);
            }

            $exists = $builder->countAllResults() > 0;

            return $this->response->setJSON([
                'success' => true,
                'is_unique' => !$exists,
                'field' => $field,
                'value' => $value
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Unique validation error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Validation check failed'
            ]);
        }
    }

    public function store()
    {
        $validationRules = [
            'upcEan' => 'if_exist|is_unique[g_release.upc_ean]',
            'isrc' => 'if_exist|is_unique[g_release.isrc]',
        ];

        if (!$this->validate($validationRules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors(),
                ]);
            }

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $artworkPath = null;
            $artworkFile = $this->request->getFile('artworkFile');
            if ($artworkFile && $artworkFile->isValid()) {
                $artworkName = $artworkFile->getRandomName();
                $artworkFile->move(FCPATH . 'uploads/artworks', $artworkName);
                $artworkPath = 'uploads/artworks/' . $artworkName;
            }

            $audioPath = null;
            $audioFile = $this->request->getFile('audioFile');
            if ($audioFile && $audioFile->isValid()) {
                $audioName = $audioFile->getRandomName();
                $audioFile->move(FCPATH . 'uploads/audio', $audioName);
                $audioPath = 'uploads/audio/' . $audioName;
            }

            $stores = $this->request->getPost('stores') ?? [];
            $rights = $this->request->getPost('rights') ?? [];

            $releaseData = [
                'title'                     => $this->request->getPost('releaseTitle'),
                'label_id'                  => $this->request->getPost('label_id'),
                'artist_id'                 => $this->request->getPost('artist'),
                'featured_artist_id'        => $this->request->getPost('featuringArtist'),
                'release_type'              => $this->request->getPost('releaseType'),
                'mood_type'                 => $this->request->getPost('mood'),
                'genre_type'                => $this->request->getPost('genre'),
                'upc_ean'                   => $this->request->getPost('upcEan'),
                'language'                  => $this->request->getPost('language'),
                'artwork'                   => $artworkPath,
                'track_title'               => $this->request->getPost('trackTitle'),
                'secondary_track_type'      => $this->request->getPost('secondaryTrackType'),
                'instrumental'              => $this->request->getPost('instrumental'),
                'isrc'                      => $this->request->getPost('isrc'),
                'author'                    => $this->request->getPost('author'),
                'composer'                  => $this->request->getPost('composer'),
                'remixer'                   => $this->request->getPost('remixer'),
                'arranger'                  => $this->request->getPost('arranger'),
                'music_producer'            => $this->request->getPost('producer'),
                'publisher'                 => $this->request->getPost('publisher'),
                'c_line_year'               => $this->request->getPost('cLineYear'),
                'c_line'                    => $this->request->getPost('cLine'),
                'p_line_year'               => $this->request->getPost('pLineYear'),
                'p_line'                    => $this->request->getPost('pLine'),
                'production_year'           => $this->request->getPost('productionYear'),
                'track_title_language'      => $this->request->getPost('trackLanguage'),
                'explicit_song'             => $this->request->getPost('explicit'),
                'lyrics'                    => $this->request->getPost('lyrics'),
                'audio_file'                => $audioPath,
                'release_date'              => $this->request->getPost('release_date'),
                'stores_ids'                => json_encode($stores),
                'rights_management_options' => json_encode($rights),
                'pre_sale_date'             => $this->request->getPost('pre_sale_date'),
                'original_release_date'     => $this->request->getPost('original_release_date'),
                'release_price'             => $this->request->getPost('release_price'),
                'sale_price'                => $this->request->getPost('sale_price'),
                't_and_c'                   => 'yes',
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s'),
                'status'                    => (int)$this->request->getPost('status') ?: 1,
                'created_by'                => session()->get('user')['id'],
            ];

            $releaseId = $this->releaseRepo->create($releaseData);

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Release created successfully',
                    'redirect' => '/releases'
                ]);
            }

            return redirect()->to('/releases')->with('success', 'Release created successfully');
        } catch (\Exception $e) {
            log_message('error', 'Release creation failed: ' . $e->getMessage());

            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(500)->setJSON([
                    'success' => false,
                    'error' => 'Failed to create release: ' . $e->getMessage()
                ]);
            }

            return redirect()->back()->withInput()->with('error', 'Failed to create release: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        $validationRules = [
            'upcEan' => "required|is_unique[g_release.upc_ean,id,{$id}]",
            'isrc' => "required|is_unique[g_release.isrc,id,{$id}]",
            // Add other validation rules as needed
        ];

        if (!$this->validate($validationRules)) {
            return $this->request->isAJAX()
                ? $this->response->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors(),
                ])
                : redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            log_message('debug', 'POST data received: ' . json_encode($this->request->getPost()));

            $release = $this->releaseRepo->find($id);
            if (!$release) {
                if ($this->request->isAJAX()) {
                    return $this->response->setStatusCode(404)->setJSON([
                        'success' => false,
                        'error' => 'Release not found'
                    ]);
                }
                return redirect()->to('/releases')->with('error', 'Release not found');
            }

            $status = (int)$this->request->getPost('status');
            if (!$status) {
                $status = (int)$release['status'];
            }

            if ($release['status'] == 3 && $status == 1) {
                $status = 3;
                log_message('debug', 'Status changed from Delivered to Takedown due to submit action');
            }

            $rejectionMessage = $this->request->getPost('message');

            log_message('debug', 'Status value: ' . $status);
            log_message('debug', 'Rejection message: ' . $rejectionMessage);

            $artworkPath = $release['artwork'];
            $artworkFile = $this->request->getFile('artworkFile');
            if ($artworkFile && $artworkFile->isValid() && !$artworkFile->hasMoved()) {
                $artworkName = $artworkFile->getRandomName();
                if ($artworkFile->move(FCPATH . 'uploads/artworks', $artworkName)) {
                    $artworkPath = 'uploads/artworks/' . $artworkName;
                }
            }

            $audioPath = $release['audio_file'];
            $audioFile = $this->request->getFile('audioFile');
            if ($audioFile && $audioFile->isValid() && !$audioFile->hasMoved()) {
                $audioName = $audioFile->getRandomName();
                if ($audioFile->move(FCPATH . 'uploads/audio', $audioName)) {
                    $audioPath = 'uploads/audio/' . $audioName;
                }
            }

            $stores = $this->request->getPost('stores') ?? [];
            $rights = $this->request->getPost('rights') ?? [];

            $releaseData = [
                'id'                        => $id,
                'title'                     => $this->request->getPost('releaseTitle'),
                'label_id'                  => $this->request->getPost('label_id'),
                'artist_id'                 => $this->request->getPost('artist'),
                'featuring_artist_id'       => $this->request->getPost('featuringArtist'),
                'release_type'              => $this->request->getPost('releaseType'),
                'mood_type'                 => $this->request->getPost('mood'),
                'genre_type'                => $this->request->getPost('genre'),
                'upc_ean'                   => $this->request->getPost('upcEan'),
                'language'                  => $this->request->getPost('language'),
                'artwork'                   => $artworkPath,
                'track_title'               => $this->request->getPost('trackTitle'),
                'secondary_track_type'      => $this->request->getPost('secondaryTrackType'),
                'instrumental'              => $this->request->getPost('instrumental'),
                'isrc'                      => $this->request->getPost('isrc'),
                'author'                    => $this->request->getPost('author'),
                'composer'                  => $this->request->getPost('composer'),
                'remixer'                   => $this->request->getPost('remixer'),
                'arranger'                  => $this->request->getPost('arranger'),
                'music_producer'            => $this->request->getPost('producer'),
                'publisher'                 => $this->request->getPost('publisher'),
                'c_line_year'               => $this->request->getPost('cLineYear'),
                'c_line'                    => $this->request->getPost('cLine'),
                'p_line_year'               => $this->request->getPost('pLineYear'),
                'p_line'                    => $this->request->getPost('pLine'),
                'production_year'           => $this->request->getPost('productionYear'),
                'track_title_language'      => $this->request->getPost('trackLanguage'),
                'explicit_song'             => $this->request->getPost('explicit'),
                'lyrics'                    => $this->request->getPost('lyrics'),
                'audio_file'                => $audioPath,
                'release_date'              => $this->request->getPost('release_date'),
                'stores_ids'                => json_encode($stores),
                'rights_management_options' => json_encode($rights),
                'pre_sale_date'             => $this->request->getPost('pre_sale_date'),
                'original_release_date'     => $this->request->getPost('original_release_date'),
                'release_price'             => $this->request->getPost('release_price'),
                'sale_price'                => $this->request->getPost('sale_price'),
                't_and_c'                   => 'yes',
                'updated_at'                => date('Y-m-d H:i:s'),
                'status'                    => $status,
            ];

            if ($status == 4 && !empty($rejectionMessage)) {
                $releaseData['rejected_at'] = date('Y-m-d H:i:s');
                $releaseData['message'] = $rejectionMessage;
                log_message('debug', 'Marking release as Rejected at: ' . $releaseData['rejected_at']);
            }

            if ($status == 3) {
                $releaseData['delivered_at'] = date('Y-m-d H:i:s');
                log_message('debug', 'Marking release as delivered at: ' . $releaseData['delivered_at']);
            }

            if ($status == 2) {
                $releaseData['takedown_at'] = date('Y-m-d H:i:s');
                log_message('debug', 'Marking release as takedown at: ' . $releaseData['takedown_at']);
            }

            if ($status == 5) {
                $releaseData['approved_at'] = date('Y-m-d H:i:s');
                log_message('debug', 'Marking Approved at: ' . $releaseData['approved_at']);
            }

            if ($status == 6) {
                $releaseData['takedown_request_at'] = date('Y-m-d H:i:s');
                log_message('debug', 'Marking release as takedown requested at: ' . $releaseData['takedown_request_at']);
            }

            log_message('debug', 'Final release data status: ' . $releaseData['status']);

            $model = new ReleaseModel();
            $result = $model->save($releaseData);

            if (!$result) {
                throw new \Exception('Failed to save release data');
            }

            $statusMessages = [
                1 => 'Release submitted successfully',
                2 => 'Release taken down successfully',
                3 => 'Release marked as delivered successfully',
                4 => 'Release rejected successfully' . (!empty($rejectionMessage) ? ' with message' : ''),
                5 => 'Release approved successfully',
                6 => 'Takedown request submitted successfully'
            ];

            $message = $statusMessages[$status] ?? 'Release updated successfully';

            $redirectUrl = '/releases';
            if ($status == 3 || $status == 2) {
                $redirectUrl = "/releases/view/{$id}";
            }

            if ($this->request->isAJAX()) {
                if (ob_get_length()) ob_clean();

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                    'redirect' => $redirectUrl,
                    'status' => $status
                ]);
            }

            return redirect()->to($redirectUrl)->with('success', $message);
        } catch (\Exception $e) {
            log_message('error', 'Release update failed: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            if ($this->request->isAJAX()) {
                if (ob_get_length()) ob_clean();

                return $this->response->setStatusCode(500)->setJSON([
                    'success' => false,
                    'error' => 'Failed to update release: ' . $e->getMessage()
                ]);
            }

            return redirect()->back()->withInput()->with('error', 'Failed to update release: ' . $e->getMessage());
        }
    }

    public function addRelease()
    {
        $session = session();
        $user = $session->get('user');

        $labelModel = new LabelModel();
        $artistModel = new ArtistModel();
        $genreModel = new GenreModel();
        $languageModel = new LanguageModel();

        if (in_array($user['role_id'], [1, 2])) {
            $labels = $labelModel->where('status', 2)->findAll();
            $artists = $artistModel->findAll();
        } else {
            $userPrimaryLabel = $user['primary_label_name'] ?? null;
            $labels = $this->getLabelsForUser($user['id'], $userPrimaryLabel);
            $artists = $userPrimaryLabel ? $artistModel->where('label_name', $userPrimaryLabel)->findAll() : [];
        }

        $genres = $genreModel->findAll();
        $languages = $languageModel->findAll();

        $page_array = [
            'file_name' => 'add-release',
            'user' => $user,
            'labels' => $labels,
            'release' => null,
            'isEdit' => false,
            'artists' => $artists,
            'genres' => $genres,
            'languages' => $languages
        ];

        return view('superadmin/index', $page_array);
    }

    public function view_release($id = null)
    {
        try {
            if (!$id || !is_numeric($id)) {
                return redirect()->to('/releases')->with('error', 'Invalid release ID');
            }

            $session = session();
            $user = $session->get('user');
            $userId = $user['id'] ?? null;
            $userRole = $user['role_id'] ?? 3;
            $userPrimaryLabel = $user['primary_label_name'] ?? null;

            $release = $this->releaseRepo->find($id);
            if (!$release) {
                return redirect()->to('/releases')->with('error', 'Release not found');
            }

            if (!in_array($userRole, [1, 2])) {
                $labelModel = new LabelModel();
                $label = $labelModel->find($release['label_id']);
                $releasePrimaryLabel = $label['primary_label_name'] ?? null;

                if ($release['created_by'] != $userId && $releasePrimaryLabel !== $userPrimaryLabel) {
                    return redirect()->to('/releases')->with('error', 'You are not authorized to view this release');
                }
            }

            $artistModel = new ArtistModel();
            $artist = $artistModel->find($release['artist_id']);

            $labelModel = new LabelModel();
            $label = $labelModel->find($release['label_id']);

            $stores = !empty($release['stores_ids']) ? json_decode($release['stores_ids'], true) : [];
            $rights = !empty($release['rights_management_options']) ? json_decode($release['rights_management_options'], true) : [];
            $storeNames = !empty($stores) ? $stores : [];
            $rightsNames = !empty($rights) ? $rights : [];
            $statusMap = [
                1 => 'Review',
                2 => 'Takedown',
                3 => 'Delivered',
                4 => 'Rejected',
                5 => 'Approved',
                6 => 'Takedown Requested',
            ];

            $canTakedown = in_array($user['role_id'], [1, 2]);

            $data = [
                'file_name' => 'view_release',
                'release' => $release,
                'artist' => $artist,
                'label' => $label,
                'storeNames' => $storeNames,
                'rightsNames' => $rightsNames,
                'statusText' => $statusMap[$release['status']] ?? 'Unknown',
                'canTakedown' => $canTakedown,
                'user' => $user,
            ];

            return view('superadmin/index', $data);
        } catch (\Exception $e) {
            log_message('error', 'View release failed: ' . $e->getMessage());
            return redirect()->to('/releases')->with('error', 'Failed to load release details.');
        }
    }


    public function exportCsv()
    {
        $session = session();
        $user = $session->get('user');
        $userRole = $user['role_id'] ?? 3;
        $userPrimaryLabel = $user['primary_label_name'] ?? null;

        $labelModel = new \App\Models\Backend\LabelModel();

        if (in_array($userRole, [1, 2])) {
            $releases = $this->releaseRepo->getLabelName();
        } else {
            $labels = $labelModel->where('primary_label_name', $userPrimaryLabel)->findAll();
            $labelIds = array_column($labels, 'id');

            $releases = $this->releaseRepo->findAllByLabelIds($labelIds);
        }

        $filename = 'releases_' . date('YmdHis') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'ID',
            'Title',
            'Label',
            'Release Type',
            'Mood Type',
            'Genre Type',
            'UPC/EAN',
            'Language',
            'Track Title',
            'ISRC',
            'Author',
            'Composer',
            'Publisher',
            'Production Year',
            'Release Date',
            'Stores',
            'Rights Management',
            'Artist Name',
            'Featuring Artist Name',
            'Secondary Track Type',
            'Instrumental',
            'Remixer',
            'Arranger',
            'Music Producer',
            'C Line Year',
            'C Line',
            'P Line Year',
            'P Line',
            'Track Title Language',
            'Explicit Song',
            'Lyrics',
            'Pre-Sale Date',
            'Original Release Date',
            'Release Price',
            'Sale Price',
            'T&C',
            'Artwork URL',
            'Audio URL',
            'Updated At',
            'Status'
        ]);

        $artistModel = new \App\Models\Backend\ArtistModel();

        $statusMapping = [
            1 => 'Review',
            2 => 'Takedown',
            3 => 'Delivered',
            4 => 'Rejected',
            5 => 'Approved',
            6 => 'Takedown Requested'
        ];

        foreach ($releases as $release) {
            $labelName = '';
            if (!empty($release['label_name']) && !empty($release['primary_label_name'])) {
                $labelName = $release['label_name'] . ' (' . $release['primary_label_name'] . ')';
            } elseif (!empty($release['label_name'])) {
                $labelName = $release['label_name'];
            }

            $stores = '';
            if (!empty($release['stores_ids'])) {
                $decodedStores = json_decode($release['stores_ids'], true);
                $stores = is_array($decodedStores) ? implode(', ', $decodedStores) : $release['stores_ids'];
            }

            $rights = '';
            if (!empty($release['rights_management_options'])) {
                $decodedRights = json_decode($release['rights_management_options'], true);
                $rights = is_array($decodedRights) ? implode(', ', $decodedRights) : $release['rights_management_options'];
            }

            $artist = $artistModel->find($release['artist_id']);
            $featuringArtist = $artistModel->find($release['featuring_artist_id']);

            $artistName = $artist['name'] ?? '';
            $featuringArtistName = $featuringArtist['name'] ?? '';

            $status = $statusMapping[$release['status']] ?? $release['status'];

            fputcsv($file, [
                $release['id'],
                $release['title'],
                $labelName,
                $release['release_type'],
                $release['mood_type'],
                $release['genre_type'],
                $release['upc_ean'],
                $release['language'],
                $release['track_title'],
                $release['isrc'],
                $release['author'],
                $release['composer'],
                $release['publisher'],
                $release['production_year'],
                $release['release_date'],
                $stores,
                $rights,
                $artistName,
                $featuringArtistName,
                $release['secondary_track_type'],
                $release['instrumental'],
                $release['remixer'],
                $release['arranger'],
                $release['music_producer'],
                $release['c_line_year'],
                $release['c_line'],
                $release['p_line_year'],
                $release['p_line'],
                $release['track_title_language'],
                $release['explicit_song'],
                $release['lyrics'],
                $release['pre_sale_date'],
                $release['original_release_date'],
                $release['release_price'],
                $release['sale_price'],
                $release['t_and_c'],
                base_url() . ($release['artwork'] ?? ''),
                base_url() . ($release['audio_file'] ?? ''),
                $release['updated_at'],
                $status
            ]);
        }

        fclose($file);
        exit;
    }

    public function takedown_release($id = null)
    {
        try {
            if (!$id || !is_numeric($id)) {
                return redirect()->to('/releases')
                    ->with('error', 'Invalid release ID');
            }

            $session = session();
            $user = $session->get('user');

            $release = $this->releaseRepo->find($id);
            if (!$release) {
                return redirect()->to('/releases')
                    ->with('error', 'Release not found');
            }

            if ($release['status'] == 2) {
                return redirect()->to('/releases/view/' . $id)
                    ->with('warning', 'Release is already taken down');
            }

            $canTakedown = in_array($user['role_id'], [1, 2]);

            if ($canTakedown) {
                $updateData = [
                    'status' => 2,
                    'takedown_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $successMessage = 'Release has been successfully taken down from distribution';
                $logMessage = "Release ID {$id} has been taken down by admin (Role ID: {$user['role_id']})";
            } else {
                $updateData = [
                    'status' => 6,
                    'takedown_request_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $successMessage = 'Takedown request has been submitted successfully';
                $logMessage = "Takedown request submitted for Release ID {$id} by user (Role ID: {$user['role_id']})";
            }

            $result = $this->releaseRepo->update($id, $updateData);

            if ($result) {
                log_message('info', $logMessage);
                return redirect()->to('/releases/view/' . $id)
                    ->with('success', $successMessage);
            } else {
                return redirect()->to('/releases/view/' . $id)
                    ->with('error', 'Failed to process takedown request. Please try again');
            }
        } catch (\Exception $e) {
            log_message('error', 'Takedown release failed: ' . $e->getMessage());
        }
    }
}
