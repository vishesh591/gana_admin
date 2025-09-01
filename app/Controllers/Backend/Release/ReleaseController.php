<?php

namespace App\Controllers\Backend\Release;

use App\Controllers\BaseController;
use App\Repositories\Releases\ReleaseRepository;
use CodeIgniter\Exceptions\PageNotFoundException;

class ReleaseController extends BaseController
{
    protected $releaseRepo;

    public function __construct()
    {
        $this->releaseRepo = new ReleaseRepository();
    }

    public function index()
    {
        $releaseCounts = $this->releaseRepo->countAllData();

        if ($this->request->isAJAX()) {
            $releases = $this->releaseRepo->findAll();

            $statusMap = [
                1 => 'review',
                2 => 'takedown',
                3 => 'delivered',
                4 => 'rejected',
                5 => 'approved',
            ];

            $artistModel = new \App\Models\Backend\ArtistModel();

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

    // public function show($id)
    // {
    //     $release = $this->releaseRepo->find($id);

    //     if (!$release) {
    //         return $this->response
    //             ->setStatusCode(404)
    //             ->setJSON(['error' => 'Release not found']);
    //     }

    //     // Map status integer to readable string
    //     $statusMap = [
    //         1 => 'review',
    //         2 => 'takedown',
    //         3 => 'delivered',
    //         4 => 'rejected',
    //         5 => 'approved',
    //     ];

    //     $release['status_text'] = isset($statusMap[$release['status']])
    //         ? $statusMap[$release['status']]
    //         : 'unknown';

    //     // Optional: include statusMap for frontend buttons
    //     return $this->response
    //         ->setJSON([
    //             'release'   => $release,
    //             'statusMap' => $statusMap
    //         ]);
    // }

    public function edit($id)
    {
        $session = session();
        $user = $session->get('user');

        // Get the release data
        $release = $this->releaseRepo->find($id);

        if (!$release) {
            throw new PageNotFoundException('Release not found');
        }

        // Get labels (same logic as addRelease)
        $labels = [];
        $labelModel = new \App\Models\Backend\LabelModel();
        $artistModel = new \App\Models\Backend\ArtistModel();
        $genreModel = new \App\Models\Backend\GenreModel();
        $languageModel = new \App\Models\Backend\LanguageModel();
        if (in_array($user['role_id'], [1, 2])) {
            // Admins: all labels
            $labels = $labelModel->findAll();
        } else {
            // Normal users: only their labels
            $labels = $labelModel->getLabelsByUser($user['id']);
        }
        $artists = $artistModel->findAll();
        $genres = $genreModel->findAll();
        $languages = $languageModel->findAll();
        // FIXED: Decode JSON fields properly
        if (!empty($release['stores_ids'])) {
            $storesDecoded = json_decode($release['stores_ids'], true);
            // Handle case where stores are nested in an array
            if (is_array($storesDecoded) && isset($storesDecoded[0]) && is_array($storesDecoded[0])) {
                $release['stores'] = $storesDecoded[0]; // Get the first array element
            } else {
                $release['stores'] = $storesDecoded ?? [];
            }
        } else {
            $release['stores'] = [];
        }

        if (!empty($release['rights_management_options'])) {
            $rightsDecoded = json_decode($release['rights_management_options'], true);
            // Handle case where rights are nested in an array
            if (is_array($rightsDecoded) && isset($rightsDecoded[0]) && is_array($rightsDecoded[0])) {
                $release['rights'] = $rightsDecoded[0]; // Get the first array element
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
            'artists'         => $artists,
            'genres'          => $genres,
            'languages'       => $languages
        ];

        return view('superadmin/index', $page_array);
    }

    // Show create form
    public function create()
    {
        return view('superadmin/releases/create');
    }

    // FIXED: Store release with proper JSON handling and response
    public function store()
    {
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

            // FIXED: Proper JSON encoding for stores and rights
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
                'stores_ids'                => json_encode($stores), // Fixed: Direct encoding
                'rights_management_options' => json_encode($rights), // Fixed: Direct encoding
                'pre_sale_date'             => $this->request->getPost('pre_sale_date'),
                'original_release_date'     => $this->request->getPost('original_release_date'),
                'release_price'             => $this->request->getPost('release_price'),
                'sale_price'                => $this->request->getPost('sale_price'),
                't_and_c'                   => 'yes', // Fixed: Set based on checkbox agreement
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s'),
                'status'                    => (int)$this->request->getPost('status') ?: 1, // Fixed: Ensure integer
            ];

            // Save release
            $releaseId = $this->releaseRepo->create($releaseData);

            // FIXED: Return proper JSON response
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Release created successfully',
                    'redirect' => '/superadmin/releases'
                ]);
            }

            return redirect()->to('/superadmin/releases')
                ->with('success', 'Release created successfully');
        } catch (\Exception $e) {
            log_message('error', 'Release creation failed: ' . $e->getMessage());

            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(500)->setJSON([
                    'success' => false,
                    'error' => 'Failed to create release: ' . $e->getMessage()
                ]);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create release: ' . $e->getMessage());
        }
    }
public function update($id)
{
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
            return redirect()->to('/superadmin/releases')
                ->with('error', 'Release not found');
        }

        $status = (int)$this->request->getPost('status');
        if (!$status) {
            $status = (int)$release['status']; // Keep existing status if not provided
        }

        // Special logic: If current status is Delivered (3) and submit button is clicked (status=1), 
        // change it to Takedown (2) instead of Review (1)
        if ($release['status'] == 3 && $status == 1) {
            $status = 2; // Change to Takedown instead of Review
            log_message('debug', 'Status changed from Delivered to Takedown due to submit action');
        }

        $rejectionMessage = $this->request->getPost('message');

        log_message('debug', 'Status value: ' . $status);
        log_message('debug', 'Rejection message: ' . $rejectionMessage);

        $artworkPath = $release['artwork']; // Keep existing artwork by default
        $artworkFile = $this->request->getFile('artworkFile');
        if ($artworkFile && $artworkFile->isValid() && !$artworkFile->hasMoved()) {
            $artworkName = $artworkFile->getRandomName();
            if ($artworkFile->move(FCPATH . 'uploads/artworks', $artworkName)) {
                $artworkPath = 'uploads/artworks/' . $artworkName;
            }
        }

        $audioPath = $release['audio_file']; // Keep existing audio by default
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
            'status'                    => $status, // Use the processed status
        ];

        // Add rejection message if status is rejected
        if ($status == 4 && !empty($rejectionMessage)) {
            $releaseData['rejected_at'] = date('Y-m-d H:i:s');
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
            log_message('debug', 'Marking Approved as delivered at: ' . $releaseData['approved_at']);
        }

        log_message('debug', 'Final release data status: ' . $releaseData['status']);

        // Use model's save method
        $model = new \App\Models\Backend\ReleaseModel();
        $result = $model->save($releaseData);

        if (!$result) {
            throw new \Exception('Failed to save release data');
        }

        // Determine success message based on status
        $statusMessages = [
            1 => 'Release submitted successfully',
            2 => 'Release taken down successfully',
            3 => 'Release marked as delivered successfully',
            4 => 'Release rejected successfully' . (!empty($rejectionMessage) ? ' with message' : ''),
            5 => 'Release approved successfully'
        ];

        $message = $statusMessages[$status] ?? 'Release updated successfully';

        // Determine redirect URL based on status
        $redirectUrl = '/superadmin/releases';
        if ($status == 3 || $status == 2) { // For delivered or takedown status
            $redirectUrl = "/superadmin/releases/view/{$id}";
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

        return redirect()->to($redirectUrl)
            ->with('success', $message);
    } catch (\Exception $e) {
        log_message('error', 'Release update failed: ' . $e->getMessage());
        log_message('error', 'Stack trace: ' . $e->getTraceAsString());

        if ($this->request->isAJAX()) {
            // Clear any output buffer
            if (ob_get_length()) ob_clean();

            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error' => 'Failed to update release: ' . $e->getMessage()
            ]);
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Failed to update release: ' . $e->getMessage());
    }
}

    public function addRelease()
    {
        $session = session();
        $user = $session->get('user');

        $labels = [];
        $labelModel = new \App\Models\Backend\LabelModel();
        $artistModel = new \App\Models\Backend\ArtistModel();
        $genreModel = new \App\Models\Backend\GenreModel();
        $languageModel = new \App\Models\Backend\LanguageModel();
        if (in_array($user['role_id'], [1, 2])) {
            $labels = $labelModel->findAll();
        } else {
            $labels = $labelModel->getLabelsByUser($user['id']);
        }
        $artists = $artistModel->findAll();
        $genres = $genreModel->findAll();
        $languages = $languageModel->findAll();
        $page_array = [
            'file_name'      => 'add-release',
            'user'           => $user,
            'labels'         => $labels,
            'release'        => null,
            'isEdit'         => false,
            'artists'         => $artists,
            'genres'          => $genres,
            'languages'       => $languages
        ];

        return view('superadmin/index', $page_array);
    }

    public function view_release($id = null)
    {
        try {
            if (!$id || !is_numeric($id)) {
                return redirect()->to('/superadmin/releases')
                    ->with('error', 'Invalid release ID');
            }

            $session = session();
            $user = $session->get('user');

            // Get release data
            $release = $this->releaseRepo->find($id);

            if (!$release) {
                return redirect()->to('/superadmin/releases')
                    ->with('error', 'Release not found');
            }

            // Get artist data
            $artistModel = new \App\Models\Backend\ArtistModel();
            $artist = $artistModel->find($release['artist_id']);

            // Get label data
            $labelModel = new \App\Models\Backend\LabelModel();
            $label = $labelModel->find($release['label_id']);

            // Decode JSON fields
            $stores = !empty($release['stores_ids']) ? json_decode($release['stores_ids'], true) : [];
            $rights = !empty($release['rights_management_options']) ? json_decode($release['rights_management_options'], true) : [];

            // Get store names
            $storeNames = !empty($stores) ? $stores : [];
            $rightsNames = !empty($rights) ? $rights : [];

            // Status mapping
            $statusMap = [
                1 => 'Review',
                2 => 'Takedown',
                3 => 'Delivered',
                4 => 'Rejected',
                5 => 'Approved',
                6 => 'Takedown Requested',
            ];

            // Check if user can perform direct takedown (roles 1 and 2)
            $canTakedown = in_array($user['role_id'], [1, 2]);

            // Prepare data for view
            $data = [
                'file_name'      => 'view_release',
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
            // return redirect()->to('/superadmin/releases')
            //     ->with('error', 'Failed to load release details');
        }
    }

    public function exportCsv()
    {
        $releases = $this->releaseRepo->getLabelName();
        $filename = 'releases_' . date('YmdHis') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'ID',
            'Title',
            'Label ID',
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

            // Newly Added Fields
            'Artist ID',
            'Featuring Artist ID',
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
            'Updated At',
            'Status'
        ]);

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

            // Status Mapping
            $statusMapping = [
                1 => 'Review',
                2 => 'Takedown',
                3 => 'Delivered',
                4 => 'Rejected',
                5 => 'Approved',
            ];
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

                // Newly Added Fields
                $release['artist_id'] ?? '',
                $release['featuring_artist_id'] ?? '',
                $release['secondary_track_type'] ?? '',
                $release['instrumental'] ?? '',
                $release['remixer'] ?? '',
                $release['arranger'] ?? '',
                $release['music_producer'] ?? '',
                $release['c_line_year'] ?? '',
                $release['c_line'] ?? '',
                $release['p_line_year'] ?? '',
                $release['p_line'] ?? '',
                $release['track_title_language'] ?? '',
                $release['explicit_song'] ?? '',
                $release['lyrics'] ?? '',
                $release['pre_sale_date'] ?? '',
                $release['original_release_date'] ?? '',
                $release['release_price'] ?? '',
                $release['sale_price'] ?? '',
                $release['t_and_c'] ?? '',
                $release['updated_at'] ?? '',
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
                return redirect()->to('/superadmin/releases')
                    ->with('error', 'Invalid release ID');
            }

            $session = session();
            $user = $session->get('user');

            $release = $this->releaseRepo->find($id);
            if (!$release) {
                return redirect()->to('/superadmin/releases')
                    ->with('error', 'Release not found');
            }

            if ($release['status'] == 2) {
                return redirect()->to('/superadmin/releases/view/' . $id)
                    ->with('warning', 'Release is already taken down');
            }

            // Check user role for takedown permissions
            $canTakedown = in_array($user['role_id'], [1, 2]);

            if ($canTakedown) {
                // Direct takedown for roles 1 and 2
                $updateData = [
                    'status' => 2,
                    'takedown_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $successMessage = 'Release has been successfully taken down from distribution';
                $logMessage = "Release ID {$id} has been taken down by admin (Role ID: {$user['role_id']})";
            } else {
                // Request takedown for other roles
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
                return redirect()->to('/superadmin/releases/view/' . $id)
                    ->with('success', $successMessage);
            } else {
                return redirect()->to('/superadmin/releases/view/' . $id)
                    ->with('error', 'Failed to process takedown request. Please try again');
            }
        } catch (\Exception $e) {
            log_message('error', 'Takedown release failed: ' . $e->getMessage());
            // return redirect()->to('/superadmin/releases/view/' . $id)
            //     ->with('error', 'An error occurred while processing the takedown request');
        }
    }
}
