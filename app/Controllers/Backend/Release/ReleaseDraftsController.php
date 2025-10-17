<?php

namespace App\Controllers\Backend\Release;

use App\Controllers\BaseController;
use App\Models\Backend\ReleaseDraftModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Repositories\Releases\ReleaseRepository;

class ReleaseDraftsController extends BaseController
{
    protected $draftModel;
    protected $releaseRepo;

    public function __construct()
    {
        $this->draftModel = new ReleaseDraftModel();
        $this->releaseRepo = new ReleaseRepository();

        helper(['form', 'url']);
    }

    /**
     * Save release form as draft
     */
    public function saveDraft()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back()->with('error', 'Invalid request method');
        }

        try {
            $session = session();
            $user = $session->get('user');
            $userId = $user['id'] ?? null;

            if (!$userId) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'User not authenticated'
                ]);
            }

            $formData = $this->request->getPost();
            $files = $this->request->getFiles();

            // Get release_id from form data
            $releaseId = $formData['release_id'] ?? null;

            $completionPercentage = $this->calculateCompletionPercentage($formData);
            $currentStep = $this->getCurrentStep($formData);

            $artworkPath = $this->handleFileUpload($files, 'artworkFile', 'artwork');
            $audioPath = $this->handleFileUpload($files, 'audioFile', 'audio');

            $draftData = [
                'user_id' => $userId,
                'release_id' => $releaseId,  // NEW: Store release_id
                'draft_name' => $formData['draft_name'] ?? 'Draft - ' . date('Y-m-d H:i:s'),
                'current_step' => $currentStep,
                'completion_percentage' => $completionPercentage,

                // Step 1 - Metadata
                'title' => $formData['releaseTitle'] ?? null,
                'label_id' => $formData['label_id'] ?? null,
                'artist_id' => $formData['artist'] ?? null,
                'featuring_artist_id' => $formData['featuringArtist'] ?? null,
                'release_type' => $formData['releaseType'] ?? null,
                'mood_type' => $formData['mood'] ?? null,
                'genre_type' => $formData['genre'] ?? null,
                'upc_ean' => $formData['upcEan'] ?? null,
                'language' => $formData['language'] ?? null,
                'artwork' => $artworkPath,

                // Step 2 - Track Information
                'track_title' => $formData['trackTitle'] ?? null,
                'secondary_track_type' => $formData['secondaryTrackType'] ?? null,
                'instrumental' => $formData['instrumental'] ?? null,
                'isrc' => $formData['isrc'] ?? null,
                'author' => $formData['author'] ?? null,
                'composer' => $formData['composer'] ?? null,
                'remixer' => $formData['remixer'] ?? null,
                'arranger' => $formData['arranger'] ?? null,
                'music_producer' => $formData['producer'] ?? null,
                'publisher' => $formData['publisher'] ?? null,
                'c_line_year' => $formData['cLineYear'] ?? null,
                'c_line' => $formData['cLine'] ?? null,
                'p_line_year' => $formData['pLineYear'] ?? null,
                'p_line' => $formData['pLine'] ?? null,
                'production_year' => $formData['productionYear'] ?? null,
                'track_title_language' => $formData['trackLanguage'] ?? null,
                'explicit_song' => $formData['explicit'] ?? null,
                'lyrics' => $formData['lyrics'] ?? null,
                'audio_file' => $audioPath,

                // Step 3 - Stores
                'stores_ids' => isset($formData['stores']) ? json_encode($formData['stores']) : null,
                'rights_management' => isset($formData['rights']) ? json_encode($formData['rights']) : null,

                // Step 4 - Dates & Pricing
                'release_date' => $formData['release_date'] ?? null,
                'pre_sale_date' => $formData['pre_sale_date'] ?? null,
                'original_release_date' => $formData['original_release_date'] ?? null,
                'release_price' => $formData['release_price'] ?? null,
                'sale_price' => $formData['sale_price'] ?? null,

                // Step 5 - Terms & Conditions
                'content_guidelines' => isset($formData['content_guidelines']) ? 1 : 0,
                'isrc_guidelines' => isset($formData['isrc_guidelines']) ? 1 : 0,
                'youtube_guidelines' => isset($formData['youtube_guidelines']) ? 1 : 0,
                'audio_store_guidelines' => isset($formData['audio_store_guidelines']) ? 1 : 0,

                'form_data_json' => json_encode($formData)
            ];

            // NEW: Check for existing draft by release_id first
            $existingDraft = null;
            if ($releaseId) {
                $existingDraft = $this->draftModel->where(['user_id' => $userId, 'release_id' => $releaseId])->first();
            }

            $draftId = $formData['draft_id'] ?? null;

            if ($existingDraft) {
                // Update existing draft by release_id
                $result = $this->draftModel->update($existingDraft['id'], $draftData);

                if ($result === false) {
                    throw new \Exception('Failed to update draft: ' . json_encode($this->draftModel->errors()));
                }

                $draftId = $existingDraft['id'];
                $message = 'Draft updated successfully';
            } elseif ($draftId) {
                // Update existing draft by draft_id
                $existingDraftById = $this->draftModel->find($draftId);
                if ($existingDraftById && $existingDraftById['user_id'] == $userId) {
                    $result = $this->draftModel->update($draftId, $draftData);

                    if ($result === false) {
                        throw new \Exception('Failed to update draft: ' . json_encode($this->draftModel->errors()));
                    }

                    $message = 'Draft updated successfully';
                } else {
                    return $this->response->setJSON([
                        'success' => false,
                        'error' => 'Draft not found or access denied'
                    ]);
                }
            } else {
                // Create new draft
                $draftId = $this->draftModel->insert($draftData);

                if ($draftId === false) {
                    throw new \Exception('Failed to create draft: ' . json_encode($this->draftModel->errors()));
                }

                $message = 'Draft saved successfully';
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => $message,
                'draft_id' => $draftId,
                'completion_percentage' => $completionPercentage,
                'current_step' => $currentStep
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Draft save error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Failed to save draft: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Get user's drafts
     */
    public function getDrafts()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;

        if (!$userId) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'data' => [], // DataTables expects 'data' property
                    'error' => 'Unauthorized'
                ])->setStatusCode(200); // Use 200 for DataTables compatibility
            }
            return redirect()->to('/login');
        }

        try {
            // Check if user is admin/superadmin (role_id 1 or 2)
            if (in_array($userRole, [1, 2])) {
                // Admin users see all drafts
                $drafts = $this->draftModel
                    ->orderBy('updated_at', 'DESC')
                    ->findAll();
            } else {
                // Non-admin users see only their own drafts (created_by)
                $drafts = $this->draftModel->where('user_id', $userId)
                    ->orderBy('updated_at', 'DESC')
                    ->findAll();
            }

            if ($this->request->isAJAX()) {
                // Format data for DataTables
                $formattedDrafts = [];
                foreach ($drafts as $draft) {
                    $formattedDrafts[] = [
                        'id' => $draft['id'] ?? '',
                        'title' => $draft['title'] ?? 'Untitled',
                        'draft_name' => $draft['draft_name'] ?? 'Unnamed Draft',
                        'completion_percentage' => intval($draft['completion_percentage'] ?? 0),
                        'updated_at' => $draft['updated_at'] ?? date('Y-m-d H:i:s'),
                        // Add any other fields you need
                    ];
                }

                // IMPORTANT: DataTables expects this exact format
                return $this->response->setJSON([
                    'data' => $formattedDrafts // Changed from 'drafts' to 'data'
                ]);
            }

            return view('admin/releases/drafts', [
                'drafts' => $drafts
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching drafts: ' . $e->getMessage());

            if ($this->request->isAJAX()) {
                // Even on error, return proper DataTables format
                return $this->response->setJSON([
                    'data' => [],
                    'error' => 'Failed to fetch drafts'
                ]);
            }

            return view('admin/releases/drafts', [
                'drafts' => []
            ]);
        }
    }

    /**
     * Load draft data into form
     */
    public function loadDraft($draftId)
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;

        if (!$userId) {
            return redirect()->to('/login');
        }

        $draft = $this->draftModel->find($draftId);

        // Role-based access check
        if (!$draft) {
            return redirect()->back()->with('error', 'Draft not found');
        }

        // Admin can access all drafts, others only their own
        if (!in_array($userRole, [1, 2]) && $draft['user_id'] != $userId) {
            return redirect()->back()->with('error', 'Access denied');
        }

        $labelModel = new \App\Models\Backend\LabelModel();
        $artistModel = new \App\Models\Backend\ArtistModel();
        $genreModel = new \App\Models\Backend\GenreModel();
        $languageModel = new \App\Models\Backend\LanguageModel();

        // Role-based filtering
        if (in_array($userRole, [1, 2])) {
            // Admin/Superadmin: all labels and all artists
            $labels = $labelModel->findAll();
            $artists = $artistModel->findAll();
        } else {
            // Non-admin: only their labels and artists from their primary label
            $labels = $labelModel->where('user_id', $userId)->findAll();
            $userPrimaryLabel = $user['primary_label_name'] ?? null;

            if ($userPrimaryLabel) {
                $artists = $artistModel->where('label_name', $userPrimaryLabel)->findAll();
            } else {
                $artists = [];
            }
        }

        $genres = $genreModel->findAll();
        $languages = $languageModel->findAll();

        $release = [
            'id' => $draft['release_id'],
            'title' => $draft['title'],
            'label_id' => $draft['label_id'],
            'artist_id' => $draft['artist_id'],
            'featuring_artist_id' => $draft['featuring_artist_id'],
            'release_type' => $draft['release_type'],
            'mood_type' => $draft['mood_type'],
            'genre_type' => $draft['genre_type'],
            'upc_ean' => $draft['upc_ean'],
            'language' => $draft['language'],
            'artwork' => isset($draft['artwork']) ? $draft['artwork'] : null,

            // Track Information
            'track_title' => $draft['track_title'],
            'secondary_track_type' => $draft['secondary_track_type'],
            'instrumental' => $draft['instrumental'],
            'isrc' => $draft['isrc'],
            'author' => $draft['author'],
            'composer' => $draft['composer'],
            'remixer' => $draft['remixer'],
            'arranger' => $draft['arranger'],
            'music_producer' => $draft['music_producer'],
            'publisher' => $draft['publisher'],
            'c_line_year' => $draft['c_line_year'],
            'c_line' => $draft['c_line'],
            'p_line_year' => $draft['p_line_year'],
            'p_line' => $draft['p_line'],
            'production_year' => $draft['production_year'],
            'track_title_language' => $draft['track_title_language'],
            'explicit_song' => $draft['explicit_song'],
            'lyrics' => $draft['lyrics'],
            'audio_file' => isset($draft['audio_file']) ? $draft['audio_file'] : null,

            'stores_ids' => $draft['stores_ids'] ? $draft['stores_ids'] : [],
            'rights' => $draft['rights_management'] ? json_decode($draft['rights_management'], true) : [],

            'release_date' => $draft['release_date'],
            'pre_sale_date' => $draft['pre_sale_date'],
            'original_release_date' => $draft['original_release_date'],
            'release_price' => $draft['release_price'],
            'sale_price' => $draft['sale_price'],

            'content_guidelines' => $draft['content_guidelines'],
            'isrc_guidelines' => $draft['isrc_guidelines'],
            'youtube_guidelines' => $draft['youtube_guidelines'],
            'audio_store_guidelines' => $draft['audio_store_guidelines']
        ];

        $formAction = base_url('releases/store');
        $formMethod = 'post';

        $page_array = [
            'file_name' => 'add-release',

            'draft' => $draft,
            'release' => $release,
            'user' => $user,

            'isEdit' => false,  // This is draft mode, not edit mode
            'isDraft' => true,

            'labels' => $labels,
            'artists' => $artists, // Now filtered based on role and primary_label_name
            'genres' => $genres,
            'languages' => $languages,

            'formAction' => $formAction,
            'formMethod' => $formMethod,

            'current_step' => $draft['current_step'] ?? 1,
            'completion_percentage' => $draft['completion_percentage'] ?? 0
        ];

        return view('superadmin/index', $page_array);
    }


    /**
     * Delete draft
     */
    public function deleteDraft($draftId)
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;

        if (!$userId) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'User not authenticated'
            ]);
        }

        $draft = $this->draftModel->find($draftId);

        // Role-based access check
        if (!$draft) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Draft not found'
            ]);
        }

        // Admin can delete all drafts, others only their own
        if (!in_array($userRole, [1, 2]) && $draft['user_id'] != $userId) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Access denied'
            ]);
        }

        // Delete associated files
        if ($draft['artwork'] && file_exists($draft['artwork'])) {
            unlink($draft['artwork']);
        }
        if ($draft['audio_file'] && file_exists($draft['audio_file'])) {
            unlink($draft['audio_file']);
        }

        $this->draftModel->delete($draftId);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Draft deleted successfully'
        ]);
    }

    public function dashboard()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;

        if (!$userId) {
            return redirect()->to('/login');
        }

        // Role-based data filtering
        if (in_array($userRole, [1, 2])) {
            // Admin users see all data
            $releaseCounts = $this->releaseRepo->countAllData();
            $revenueData = $this->releaseRepo->getTotalRevenue();
            $drafts = $this->draftModel
                ->orderBy('updated_at', 'DESC')
                ->limit(10)
                ->findAll();
        } else {
            // Non-admin users see only their own data
            $releaseCounts = $this->releaseRepo->countAllData($userId); // Pass userId to filter
            $revenueData = $this->releaseRepo->getTotalRevenue($userId); // Pass userId to filter
            $drafts = $this->draftModel->where('user_id', $userId)
                ->orderBy('updated_at', 'DESC')
                ->limit(10)
                ->findAll();
        }

        $totalRevenue = $revenueData['total_revenue'] ?? 0;

        $page_array = [
            'file_name' => 'dashboard',
            'releaseCounts' => $releaseCounts,
            'totalRevenue' => number_format($totalRevenue, 2),
            'drafts' => $drafts
        ];

        return view('superadmin/index', $page_array);
    }

    private function calculateCompletionPercentage($formData)
    {
        $totalFields = 30;
        $filledFields = 0;

        $requiredFields = [
            'releaseTitle',
            'label_id',
            'artist',
            'releaseType',
            'mood',
            'genre',
            'language',
            'trackTitle',
            'secondaryTrackType',
            'instrumental',
            'author',
            'composer',
            'cLineYear',
            'pLineYear',
            'productionYear',
            'trackLanguage',
            'explicit',
            'release_date',
            'original_release_date',
            'release_price'
        ];

        foreach ($requiredFields as $field) {
            if (!empty($formData[$field])) {
                $filledFields++;
            }
        }

        if (!empty($formData['stores'])) {
            $filledFields++;
        }

        if (
            !empty($formData['content_guidelines']) &&
            !empty($formData['isrc_guidelines']) &&
            !empty($formData['youtube_guidelines']) &&
            !empty($formData['audio_store_guidelines'])
        ) {
            $filledFields++;
        }

        return min(100, round(($filledFields / $totalFields) * 100));
    }

    private function getCurrentStep($formData)
    {
        if (!empty($formData['content_guidelines'])) {
            return 5;
        }

        if (!empty($formData['release_date']) && !empty($formData['release_price'])) {
            return 4;
        }

        if (!empty($formData['stores'])) {
            return 3;
        }

        if (!empty($formData['trackTitle']) && !empty($formData['author'])) {
            return 2;
        }

        return 1;
    }

    private function handleFileUpload($files, $fieldName, $folder)
    {
        if (!isset($files[$fieldName]) || !$files[$fieldName]->isValid() || $files[$fieldName]->hasMoved()) {
            return null;
        }

        $file = $files[$fieldName];
        $uploadPath = FCPATH . 'uploads/drafts/' . $folder . '/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Generate a random safe filename
        $newName = $file->getRandomName();

        if ($file->move($uploadPath, $newName)) {
            // Return relative path instead of absolute
            return 'uploads/drafts/' . $folder . '/' . $newName;
        }

        return null;
    }
}
