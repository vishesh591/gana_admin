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

    // Show all releases (paginated)
    public function index()
    {
        if ($this->request->isAJAX()) {
            $releases = $this->releaseRepo->findAll();

            // Transform your DB status (int) into string form expected by frontend
            $statusMap = [
                1 => 'review',
                2 => 'takedown',
                3 => 'delivered',
                4 => 'rejected',
                5 => 'approved',
            ];

            $releasesData = array_map(function ($r) use ($statusMap) {
                return [
                    'id' => $r['id'],
                    'title' => $r['title'],
                    'artist' => $r['author'],
                    'submittedDate' => date('jS F Y', strtotime($r['created_at'])),
                    'upc' => $r['upc_ean'],
                    'isrc' => $r['isrc'],
                    'status' => $statusMap[$r['status']] ?? 'review',
                    'albumArtwork' => '/images/rocket.png', // or from DB if you store it
                ];
            }, $releases);

            return $this->response->setJSON(['data' => $releasesData]);
        }

        // normal page load
        $page_array = [
            'file_name' => 'releases',
        ];
        return view('superadmin/index', $page_array);
    }

    public function show($id)
    {
        $release = $this->releaseRepo->find($id);

        if (!$release) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Release not found']);
        }

        // Map status integer to readable string
        $statusMap = [
            1 => 'review',
            2 => 'takedown',
            3 => 'delivered',
            4 => 'rejected',
            5 => 'approved',
        ];

        $release['status_text'] = isset($statusMap[$release['status']])
            ? $statusMap[$release['status']]
            : 'unknown';

        // Optional: include statusMap for frontend buttons
        return $this->response
            ->setJSON([
                'release'   => $release,
                'statusMap' => $statusMap
            ]);
    }

    // NEW: Edit method to show the form with pre-filled data
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

        if (in_array($user['role_id'], [1, 2])) {
            // Admins: all labels
            $labels = $labelModel->findAll();
        } else {
            // Normal users: only their labels
            $labels = $labelModel->getLabelsByUser($user['id']);
        }

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
                'featured_artists'         => $this->request->getPost('featuringArtist'),
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
                'featured_artists'         => $this->request->getPost('featuringArtist'),
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

            if ($status == 4 && !empty($rejectionMessage)) {
                $releaseData['message'] = $rejectionMessage;
                log_message('debug', 'Added rejection message to release data: ' . $rejectionMessage);
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
                4 => 'Release rejected successfully' . (!empty($rejectionMessage) ? ' with message' : ''),
                5 => 'Release approved successfully'
            ];

            $message = $statusMessages[$status] ?? 'Release updated successfully';

            if ($status == 4 && !empty($rejectionMessage)) {
                $this->sendRejectionNotification($release, $rejectionMessage);
            }

            if ($this->request->isAJAX()) {
                if (ob_get_length()) ob_clean();

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                    'redirect' => '/superadmin/releases',
                    'status' => $status
                ]);
            }

            return redirect()->to('/superadmin/releases')
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

    /**
     * Send rejection notification email to the user
     */
    private function sendRejectionNotification($release, $rejectionMessage)
    {
        try {
            // Load email library if available
            $email = \Config\Services::email();

            // Get user/artist details for the release
            // Assuming you have a method to get user email from release data
            $userEmail = $this->getUserEmailFromRelease($release);

            if (!$userEmail) {
                log_message('warning', 'Could not find user email for release rejection notification');
                return false;
            }

            $email->setTo($userEmail);
            $email->setFrom('noreply@yoursite.com', 'Music Distribution Platform');
            $email->setSubject('Release Rejected: ' . $release['title']);

            $emailBody = "
        <h2>Release Rejection Notice</h2>
        <p>Hello,</p>
        <p>Your release '<strong>{$release['title']}</strong>' has been rejected for the following reason:</p>
        <div style='background-color: #f8f9fa; padding: 15px; border-left: 4px solid #dc3545; margin: 20px 0;'>
            <p><strong>Rejection Reason:</strong></p>
            <p>" . nl2br(htmlspecialchars($rejectionMessage)) . "</p>
        </div>
        <p>Please review the feedback and make the necessary changes before resubmitting your release.</p>
        <p>If you have any questions, please contact our support team.</p>
        <p>Best regards,<br>Music Distribution Team</p>
        ";

            $email->setMessage($emailBody);

            if ($email->send()) {
                log_message('info', 'Rejection notification sent successfully for release ID: ' . $release['id']);
                return true;
            } else {
                log_message('error', 'Failed to send rejection notification: ' . $email->printDebugger());
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception in sendRejectionNotification: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get user email from release data
     * Adjust this method based on your database structure
     */
    private function getUserEmailFromRelease($release)
    {
        try {
            // Example: If you have artist_id, get email from artists table
            if (!empty($release['artist_id'])) {
                $artistModel = new \App\Models\Backend\ArtistModel(); // Adjust model name
                $artist = $artistModel->find($release['artist_id']);

                if ($artist && !empty($artist['email'])) {
                    return $artist['email'];
                }
            }

            // Example: If you have label_id, get email from labels table
            if (!empty($release['label_id'])) {
                $labelModel = new \App\Models\Backend\LabelModel(); // Adjust model name
                $label = $labelModel->find($release['label_id']);

                if ($label && !empty($label['email'])) {
                    return $label['email'];
                }
            }

            // Add more logic based on your data structure
            return null;
        } catch (\Exception $e) {
            log_message('error', 'Error getting user email from release: ' . $e->getMessage());
            return null;
        }
    }

    public function addRelease()
    {
        $session = session();
        $user = $session->get('user');

        $labels = [];
        $labelModel = new \App\Models\Backend\LabelModel();

        if (in_array($user['role_id'], [1, 2])) {
            $labels = $labelModel->findAll();
        } else {
            $labels = $labelModel->getLabelsByUser($user['id']);
        }

        $page_array = [
            'file_name'      => 'add-release',
            'user'           => $user,
            'labels'         => $labels,
            'release'        => null,
            'isEdit'         => false,
        ];

        return view('superadmin/index', $page_array);
    }
}
