<?php

namespace App\Controllers\Backend\YoutubeConflict;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Backend\YoutubeConflict\YoutubeConflictModel;

class YoutubeConflictController extends BaseController
{

    public function index()
    {
        $data = $this->getConflictsData();

        return view('superadmin/index', [
            'file_name' => 'youtube',
            'data' => $data,
        ]);
    }

    /**
     * Return conflicts data as JSON
     */
    public function listConflictsJson()
    {
        $data = $this->getConflictsData();

        // Encode JSON safely with proper flags
        $json = json_encode(
            ['data' => $data],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );

        // If encoding fails, log error and return empty array
        if ($json === false) {
            log_message('error', 'JSON encode failed in listConflictsJson(): ' . json_last_error_msg());
            return $this->response->setJSON(['data' => []]);
        }

        // Return valid JSON response
        return $this->response
            ->setHeader('Content-Type', 'application/json')
            ->setBody($json);
    }

    /**
     * Get formatted conflicts data
     */

    public function import()
    {
        $file = $this->request->getFile('file');
        if (!$file || !$file->isValid() || $file->getExtension() !== 'csv') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid file. Please upload a CSV file.'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $csv = array_map('str_getcsv', file($file->getTempName()));
        $header = array_map('trim', $csv[0]);
        unset($csv[0]);

        $model = new YoutubeConflictModel();
        $processed = 0;
        $inserted = 0;

        foreach ($csv as $row) {
            if (count($row) < 32) {
                continue; // skip incomplete rows
            }

            $data = [
                'issue_id'                        => $row[0] ?? null,
                'issue_type'                      => $row[1] ?? null,
                'other_party'                     => $row[2] ?? null,
                'expiry_date'                     => $row[3] ?? null,
                'expiry_time'                     => $row[4] ?? null,
                'asset_name'                      => $row[5] ?? null,
                'asset_type'                      => $row[6] ?? null,
                'asset_created_on'                => $row[7] ?? null,
                'asset_id'                        => $row[8] ?? null,
                'reference_id'                    => $row[9] ?? null,
                'isrc'                            => $row[10] ?? null,
                'upc'                             => $row[11] ?? null,
                'custom_id'                       => $row[12] ?? null,
                'labels'                          => $row[13] ?? null,
                'iswc'                            => $row[14] ?? null,
                'overlapping_asset_id'            => $row[15] ?? null,
                'overlapping_asset_name'          => $row[16] ?? null,
                'video_id'                        => $row[17] ?? null,
                'video_title'                     => $row[18] ?? null,
                'channel_name'                    => $row[19] ?? null,
                'channel_id'                      => $row[20] ?? null,
                'claim_id'                        => $row[21] ?? null,
                'match_type'                      => $row[22] ?? null,
                'engaged_views_affected_daily'    => $row[23] ?? null,
                'engaged_views_lifetime'          => $row[24] ?? null,
                'claimed_videos_affected'         => $row[25] ?? null,
                'duration_time_seconds'           => $row[26] ?? null,
                'duration_percentage_reference'   => $row[27] ?? null,
                'duration_percentage_video'       => $row[28] ?? null,
                'status'                          => $row[29] ?? null,
                'status_detail'                   => $row[30] ?? null,
                'link_to_issue'                   => $row[31] ?? null,
            ];

            try {
                $model->insert($data);
                $inserted++;
            } catch (\Exception $e) {
                log_message('error', 'YouTube Conflict import failed: ' . $e->getMessage());
            }

            $processed++;
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Import completed.',
            'processed_rows' => $processed,
            'inserted_rows' => $inserted
        ]);
    }
    private function getConflictsData()
    {
        $youtubeConflict = new YoutubeConflictModel();
        $conflicts = $youtubeConflict
            ->orderBy('id', 'DESC')->whereIn('status', ['In Review', 'Action Required'])
            ->findAll();

        $data = [];

        foreach ($conflicts as $conflict) {
            // Format rights owned text for display
            $rightsOwnedDisplay = '';
            switch ($conflict['resolution_rights_owned']) {
                case 'original_exclusive':
                    $rightsOwnedDisplay = 'My content is Original and I own exclusive rights';
                    break;
                case 'non_exclusive':
                    $rightsOwnedDisplay = 'I own non-exclusive rights only (license granted by a third party)';
                    break;
                case 'cid_exclusive':
                    $rightsOwnedDisplay = 'I have granted exclusive license for Content-ID stores only';
                    break;
                case 'soundalike':
                    $rightsOwnedDisplay = 'It is soundalike recording (e.g., cover or remix)';
                    break;
                case 'public_domain':
                    $rightsOwnedDisplay = 'It is Public Domain recording';
                    break;
                case 'no_rights':
                    $rightsOwnedDisplay = 'I don\'t own rights for the selected content';
                    break;
                default:
                    $rightsOwnedDisplay = $conflict['resolution_rights_owned'] ?? '';
            }

            // Create resolution data object - ensure all values are properly sanitized
            $resolutionData = [
                'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                'rightsOwnedDisplay' => $rightsOwnedDisplay,
                'supportingDocumentPath' => base_url() . ($conflict['supporting_document_path'] ?? ''),
                'supportingFile' => base_url() . $conflict['supporting_document_path'] ?? '',
                'resolutionDate' => $conflict['resolution_date'] ?? $conflict['updated_at'] ?? '',
            ];

            // Format data for frontend display
            $data[] = [
                'id' => $conflict['id'],
                'category' => $this->formatConflictCategory($conflict['issue_type']),
                'assetTitle' => $conflict['asset_name'] ?? '',
                'artist' => $this->extractArtistFromLabels($conflict['labels']),
                'assetId' => $conflict['asset_id'] ?? '',
                'upc' => $conflict['upc'] ?? '',
                'isrc' => $conflict['isrc'] ?? '',
                'otherParty' => $conflict['other_party'] ?? '',
                'dailyViews' => $this->formatViewCount($conflict['engaged_views_affected_daily']),
                'expiry' => $this->formatExpiryDate($conflict['expiry_date']),
                'status' => $this->formatStatus($conflict['status']),

                'songName' => $conflict['asset_name'] ?? '',
                'artistName' => $this->extractArtistFromLabels($conflict['labels']),
                'issueType' => $conflict['issue_type'] ?? '',
                'videoTitle' => $conflict['video_title'] ?? '',
                'channelName' => $conflict['channel_name'] ?? '',
                'albumCoverUrl' => $this->generatePlaceholderImage($conflict['asset_name']),

                // Rights + file info for existing resolutions
                'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                'supportingFile' => $conflict['supporting_document_path'] ?? '',

                // Resolution data for "In Review" status
                'resolutionData' => $resolutionData,

                'details' => [
                    'issue_id' => $conflict['issue_id'] ?? '',
                    'video_id' => $conflict['video_id'] ?? '',
                    'channel_id' => $conflict['channel_id'] ?? '',
                    'claim_id' => $conflict['claim_id'] ?? '',
                    'match_type' => $conflict['match_type'] ?? '',
                    'duration_seconds' => $conflict['duration_time_seconds'] ?? 0,
                    'duration_percentage_reference' => $conflict['duration_percentage_reference'] ?? 0,
                    'duration_percentage_video' => $conflict['duration_percentage_video'] ?? 0,
                    'link_to_issue' => $conflict['link_to_issue'] ?? '',
                ],
            ];
        }

        return $data;
    }

    /**
     * Update conflict resolution
     */
    public function update($id)
    {
        $youtubeConflict = new YoutubeConflictModel();
        $conflict = $youtubeConflict->find($id);

        if (!$conflict) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Conflict not found.'
            ]);
        }

        $rightsOwned = $this->request->getPost('rightsOwned');
        $resolutionDate = date('Y-m-d H:i:s');
        $supportingDoc = null;

        // Handle file upload
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/youtube_conflicts';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);

            $supportingDoc = 'uploads/youtube_conflicts/' . $newName;
        }

        $data = [
            'resolution_rights_owned' => $rightsOwned,
            'resolution_date' => $resolutionDate,
            'supporting_document_path' => $supportingDoc,
            'resolution_status' => 'In Review',
            'status' => 'In Review',
        ];

        $youtubeConflict->update($id, $data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Conflict updated successfully.',
            'data' => $data
        ]);
    }

    public function youtubeOwnershipIndex()
    {
        $data = $this->getYoutubeConflictsData();

        return view('superadmin/index', [
            'file_name' => 'youtube-ownership',
            'data' => $data,
        ]);
    }

    /**
     * YouTube Ownership Conflicts JSON Data
     */
    public function listYouTubeOwnershipConflictsJson()
    {
        $data = $this->getYoutubeConflictsData();

        // Encode JSON safely with proper flags
        $json = json_encode(
            ['data' => $data],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );

        // If encoding fails, log error and return empty array
        if ($json === false) {
            log_message('error', 'JSON encode failed in listYouTubeOwnershipConflictsJson(): ' . json_last_error_msg());
            return $this->response->setJSON(['data' => []]);
        }

        // Return valid JSON response
        return $this->response
            ->setHeader('Content-Type', 'application/json')
            ->setBody($json);
    }

    private function getYoutubeConflictsData()
    {
        $youtubeConflict = new YoutubeConflictModel();
        $conflicts = $youtubeConflict
            ->orderBy('id', 'DESC')
            ->findAll();

        $data = [];

        foreach ($conflicts as $conflict) {
            // Format rights owned text for display
            $rightsOwnedDisplay = '';
            switch ($conflict['resolution_rights_owned']) {
                case 'original_exclusive':
                    $rightsOwnedDisplay = 'My content is Original and I own exclusive rights';
                    break;
                case 'non_exclusive':
                    $rightsOwnedDisplay = 'I own non-exclusive rights only (license granted by a third party)';
                    break;
                case 'cid_exclusive':
                    $rightsOwnedDisplay = 'I have granted exclusive license for Content-ID stores only';
                    break;
                case 'soundalike':
                    $rightsOwnedDisplay = 'It is soundalike recording (e.g., cover or remix)';
                    break;
                case 'public_domain':
                    $rightsOwnedDisplay = 'It is Public Domain recording';
                    break;
                case 'no_rights':
                    $rightsOwnedDisplay = 'I don\'t own rights for the selected content';
                    break;
                default:
                    $rightsOwnedDisplay = $conflict['resolution_rights_owned'] ?? '';
            }

            // Create resolution data object - ensure all values are properly sanitized
            $resolutionData = [
                'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                'rightsOwnedDisplay' => $rightsOwnedDisplay,
                'supportingDocumentPath' => base_url() . '/' . ($conflict['supporting_document_path'] ?? ''),
                'supportingFile' => base_url() . '/' . $conflict['supporting_document_path'] ?? '',
                'resolutionDate' => $conflict['resolution_date'] ?? $conflict['updated_at'] ?? '',
            ];

            // Format data for frontend display
            $data[] = [
                'id' => $conflict['id'],
                'category' => $this->formatConflictCategory($conflict['issue_type']),
                'assetTitle' => $conflict['asset_name'] ?? '',
                'artist' => $this->extractArtistFromLabels($conflict['labels']),
                'assetId' => $conflict['asset_id'] ?? '',
                'upc' => $conflict['upc'] ?? '',
                'isrc' => $conflict['isrc'] ?? '',
                'otherParty' => $conflict['other_party'] ?? '',
                'dailyViews' => $this->formatViewCount($conflict['engaged_views_affected_daily']),
                'expiry' => $this->formatExpiryDate($conflict['expiry_date']),
                'status' => $this->formatStatus($conflict['status']),

                'songName' => $conflict['asset_name'] ?? '',
                'artistName' => $this->extractArtistFromLabels($conflict['labels']),
                'issueType' => $conflict['issue_type'] ?? '',
                'videoTitle' => $conflict['video_title'] ?? '',
                'channelName' => $conflict['channel_name'] ?? '',
                'albumCoverUrl' => $this->generatePlaceholderImage($conflict['asset_name']),

                // Rights + file info for existing resolutions
                'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                'supportingFile' => base_url() . '/' . $conflict['supporting_document_path'] ?? '',

                // Resolution data for "In Review" status
                'resolutionData' => $resolutionData,

                'details' => [
                    'issue_id' => $conflict['issue_id'] ?? '',
                    'video_id' => $conflict['video_id'] ?? '',
                    'channel_id' => $conflict['channel_id'] ?? '',
                    'claim_id' => $conflict['claim_id'] ?? '',
                    'match_type' => $conflict['match_type'] ?? '',
                    'duration_seconds' => $conflict['duration_time_seconds'] ?? 0,
                    'duration_percentage_reference' => $conflict['duration_percentage_reference'] ?? 0,
                    'duration_percentage_video' => $conflict['duration_percentage_video'] ?? 0,
                    'link_to_issue' => $conflict['link_to_issue'] ?? '',
                ],
            ];
        }

        return $data;
    }

    /**
     * Update YouTube Conflict Status
     */
    public function updateYouTubeConflictStatus($id)
    {
        // Validate request method
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        // FIX: Get POST data without the problematic default parameter syntax
        $status = $this->request->getPost('status');
        $rejectionMessage = $this->request->getPost('rejectionMessage');

        // Handle null/empty values properly
        if ($rejectionMessage === null) {
            $rejectionMessage = '';
        }

        // Validate status
        if (!$status) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Status parameter is required'
            ]);
        }

        $allowedStatuses = ['In Review', 'Approved', 'Rejected', 'Action Required'];
        if (!in_array($status, $allowedStatuses)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid status value'
            ]);
        }

        // Validate rejection message if status is rejected
        if ($status === 'Rejected' && empty(trim($rejectionMessage))) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Rejection message is required when rejecting a conflict'
            ]);
        }

        try {
            $youtubeConflict = new YoutubeConflictModel();

            // Check if conflict exists
            $conflict = $youtubeConflict->find($id);
            if (!$conflict) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Conflict not found'
                ]);
            }

            // Prepare update data
            $updateData = [
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Add rejection message if status is rejected
            if ($status === 'Rejected') {
                $updateData['rejection_message'] = $rejectionMessage;
                $updateData['rejection_date'] = date('Y-m-d H:i:s');
            } else {
                // Clear rejection data if status is not rejected
                $updateData['rejection_message'] = null;
                $updateData['rejection_date'] = null;
            }

            // Set resolution date for approved status
            if ($status === 'Approved') {
                $updateData['resolution_date'] = date('Y-m-d H:i:s');
            }

            // Update the record
            $updated = $youtubeConflict->update($id, $updateData);

            if ($updated) {
                // Log the status change
                log_message('info', "YouTube Conflict ID {$id} status updated to {$status} by admin");

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Conflict status updated successfully',
                    'data' => [
                        'id' => $id,
                        'newStatus' => $status,
                        'updatedAt' => $updateData['updated_at']
                    ]
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to update conflict status'
                ]);
            }
        } catch (Exception $e) {
            log_message('error', 'Error updating YouTube conflict status: ' . $e->getMessage());

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while updating the conflict status'
            ]);
        }
    }

    private function formatConflictCategory($issueType)
    {
        if (empty($issueType)) {
            return 'Unknown';
        }

        // Convert snake_case or camelCase to Title Case
        $formatted = str_replace(['_', '-'], ' ', $issueType);
        return ucwords(strtolower($formatted));
    }

    /**
     * Extract artist name from labels field
     */
    private function extractArtistFromLabels($labels)
    {
        if (empty($labels)) {
            return 'Unknown Artist';
        }

        // If labels contain multiple values separated by comma, take first one
        $labelArray = explode(',', $labels);
        return trim($labelArray[0]);
    }

    /**
     * Format view count for display
     */
    private function formatViewCount($views)
    {
        if (empty($views) || !is_numeric($views)) {
            return '0';
        }

        $views = (int)$views;

        if ($views >= 1000000) {
            return number_format($views / 1000000, 1) . 'M';
        } elseif ($views >= 1000) {
            return number_format($views / 1000, 1) . 'K';
        }

        return number_format($views);
    }


    /**
     * Format expiry date
     */
    private function formatExpiryDate($expiryDate)
    {
        if (empty($expiryDate)) {
            return '-';
        }

        try {
            $date = new \DateTime($expiryDate);
            $now = new \DateTime();
            $diff = $now->diff($date);

            if ($date < $now) {
                return 'Expired';
            }

            if ($diff->days == 0) {
                return 'Today';
            } elseif ($diff->days == 1) {
                return '1 day';
            } else {
                return $diff->days . ' days';
            }
        } catch (\Exception $e) {
            return '-';
        }
    }

    /**
     * Format status for display
     */
    private function formatStatus($status)
    {
        if (empty($status)) {
            return 'Action Required';
        }

        switch (strtolower($status)) {
            case 'active':
            case 'pending':
                return 'Action Required';
            case 'resolved':
            case 'closed':
                return 'Resolved';
            case 'in_review':
            case 'reviewing':
                return 'In Review';
            default:
                return ucfirst($status);
        }
    }

    private function generatePlaceholderImage($assetName)
    {
        $colors = ['3498db', '1abc9c', '9b59b6', 'e67e22', 'f39c12', '2ecc71'];
        $colorIndex = abs(crc32($assetName)) % count($colors);
        $color = $colors[$colorIndex];
        $initial = strtoupper(substr($assetName, 0, 1));

        return "https://placehold.co/80x80/{$color}/ffffff?text={$initial}";
    }
}
