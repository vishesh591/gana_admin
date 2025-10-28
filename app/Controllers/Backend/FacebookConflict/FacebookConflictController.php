<?php

namespace App\Controllers\Backend\FacebookConflict;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Backend\FaceBookConflict\FacebookConflictModel;
use App\Models\ConflictCountryModel;
use App\Models\Backend\Countries\CountryModel;

class FacebookConflictController extends BaseController
{
    protected $db;
    protected $facebookConflictModel;
    protected $conflictCountryModel;
    protected $countryModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->facebookConflictModel = new FacebookConflictModel();
        $this->conflictCountryModel = new ConflictCountryModel();
        $this->countryModel = new CountryModel();
    }

    /**
     * Display the main Facebook conflicts page
     */
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        $data = $this->getConflictsData();

        return view('superadmin/index', [
            'file_name' => 'facebook',
            'data' => $data,
            'user' => $user
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
    private function getConflictsData()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'] ?? null;
        $userRole = $user['role_id'] ?? 3;
        $userPrimaryLabel = $user['primary_label_name'] ?? null;

        // Get user's ISRCs if not admin
        $userISRCs = [];
        if (!in_array($userRole, [1, 2])) {
            $releaseModel = new \App\Models\Backend\ReleaseModel();
            $labelModel = new \App\Models\Backend\LabelModel();

            if ($userPrimaryLabel) {
                // Step 1: Get all label IDs for user's primary label
                $matchingLabels = $labelModel
                    ->select('id')
                    ->where('primary_label_name', $userPrimaryLabel)
                    ->findAll();

                if (!empty($matchingLabels)) {
                    $labelIds = array_column($matchingLabels, 'id');

                    // Step 2: Get ISRCs from releases with those label IDs
                    $userReleases = $releaseModel
                        ->select('isrc')
                        ->whereIn('label_id', $labelIds)
                        ->where('isrc IS NOT NULL')
                        ->where('isrc !=', '')
                        ->findAll();

                    $userISRCs = array_column($userReleases, 'isrc');
                    $userISRCs = array_filter($userISRCs); // Remove empty values
                }
            }
        }

        // Build the query
        $query = $this->facebookConflictModel
            ->orderBy('id', 'DESC')
            ->whereIn('status', ['In Review', 'Action Required', 'Rejected']);

        // Apply ISRC filtering for non-admin users
        if (!in_array($userRole, [1, 2])) {
            if (empty($userISRCs)) {
                // User has no releases with matching primary label, return empty data
                return [];
            }
            $query->whereIn('reference_copyright_isrc', $userISRCs);
        }

        $conflicts = $query->findAll();

        $data = [];

        foreach ($conflicts as $conflict) {
            // Get related countries
            $linkedCountries = $this->conflictCountryModel
                ->select('countries.id, countries.name, countries.iso2, countries.continent')
                ->join('countries', 'countries.id = conflict_countries.country_id')
                ->where('conflict_countries.conflict_id', $conflict['id'])
                ->findAll();

            // Group by continent
            $countriesGrouped = [];
            foreach ($linkedCountries as $c) {
                $continent = $c['continent'] ?? 'Other';
                if (!isset($countriesGrouped[$continent])) {
                    $countriesGrouped[$continent] = [];
                }
                $countriesGrouped[$continent][] = [
                    'id' => $c['id'],
                    'name' => $c['name'],
                    'iso2' => $c['iso2'],
                ];
            }

            // Create a formatted country list for display purposes
            $countryDisplayText = '';
            foreach ($countriesGrouped as $continent => $countries) {
                $countryDisplayText .= $continent . ":\n";
                foreach ($countries as $country) {
                    $countryDisplayText .= "  • " . $country['name'] . "\n";
                }
                $countryDisplayText .= "\n";
            }

            // Format rights owned text for display
            $rightsOwnedDisplay = '';
            switch ($conflict['resolution_rights_owned']) {
                case 'original_exclusive':
                    $rightsOwnedDisplay = 'My content is Original and I own exclusive rights on all or part of the territories';
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

            // Format data for frontend display
            $data[] = [
                'id' => $conflict['id'],
                'category' => $this->formatConflictCategory($conflict['conflict_category']),
                'assetTitle' => $conflict['reference_copyright_title'],
                'artist' => $conflict['reference_copyright_artist'],
                'assetId' => $conflict['reference_asset_id'] ?? $conflict['reference_copyright_id'],
                'upc' => $this->extractUPC($conflict),
                'isrc' => $conflict['reference_copyright_isrc'],
                'otherParty' => $conflict['other_party_name'],
                'dailyViews' => $this->formatViewCount($conflict['last_28_days_view_count']),
                'expiry' => $this->formatExpiryDate($conflict['conflict_expiration_date']),
                'status' => $conflict['status'] ?? 'Action Required',
                'rejectionMessage' => $conflict['message'] ?? '',
                'songName' => $conflict['reference_copyright_title'],
                'artistName' => $conflict['reference_copyright_artist'],
                'conflictState' => $conflict['conflict_state'],
                'conflictCategory' => $conflict['conflict_category'],
                'matchCount' => $conflict['reference_copyright_match_count'],
                'questions' => [
                    'reference_id' => $conflict['reference_copyright_id'],
                    'asset_id' => $conflict['reference_asset_id'],
                    'overlap_percentage' => $conflict['reference_overlap_percentage'],
                    'overlap_duration' => $conflict['reference_overlap_duration_ms'],
                    'other_party_overlap' => $conflict['other_party_reference_overlap_percentage'],
                ],
                'countries' => $countriesGrouped,
                'resolutionData' => [
                    'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                    'rightsOwnedDisplay' => $rightsOwnedDisplay,
                    'resolutionDate' => $conflict['resolution_date'] ?? '',
                    'supportingDocumentPath' => base_url() . $conflict['supporting_document_path'] ?? '',
                    'countryDisplayText' => trim($countryDisplayText),
                ]
            ];
        }

        return $data;
    }


    public function getAllCountries()
    {
        try {
            // Assuming you have a countries model or can access countries table
            $countriesModel = new CountryModel(); // Adjust model name as needed

            $countries = $countriesModel
                ->select('id, name, iso2, continent')
                ->orderBy('continent, name')
                ->findAll();

            // Group countries by continent
            $countriesGrouped = [];
            foreach ($countries as $country) {
                $continent = $country['continent'] ?? 'Other';
                if (!isset($countriesGrouped[$continent])) {
                    $countriesGrouped[$continent] = [];
                }
                $countriesGrouped[$continent][] = [
                    'id' => $country['id'],
                    'name' => $country['name'],
                    'iso2' => $country['iso2'],
                ];
            }

            return $this->response->setJSON([
                'status' => 'success',
                'countries' => $countriesGrouped
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching countries: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to fetch countries'
            ]);
        }
    }
    /**
     * POST /backend/conflict/facebook/import
     */


    /**
     * Update conflict resolution
     */
    public function updateResolution()
    {
        $conflictId = $this->request->getPost('conflict_id');
        $rightsOwned = $this->request->getPost('rights_owned');
        $territories = $this->request->getPost('territories');
        $supportingDoc = $this->request->getFile('supporting_document');

        // Debug logging
        log_message('debug', 'Update Resolution - Conflict ID: ' . $conflictId);
        log_message('debug', 'Update Resolution - Rights Owned: ' . $rightsOwned);
        log_message('debug', 'Update Resolution - Territories: ' . $territories);

        if (!$conflictId) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Conflict ID is required']);
        }

        // Check if conflict exists
        $existingConflict = $this->facebookConflictModel->find($conflictId);
        if (!$existingConflict) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Conflict not found']);
        }

        try {
            $this->db->transStart();

            // Prepare update data
            $updateData = [
                'resolution_rights_owned' => $rightsOwned,
                'resolution_date' => date('Y-m-d H:i:s'),
                'status' => 'In Review'
            ];

            // Handle supporting document upload
            if ($supportingDoc && $supportingDoc->isValid() && !$supportingDoc->hasMoved()) {
                try {
                    $docPath = $this->uploadSupportingDocument($supportingDoc);
                    $updateData['supporting_document_path'] = $docPath;
                } catch (\Exception $e) {
                    log_message('error', 'File upload error: ' . $e->getMessage());
                    // Continue without file if upload fails
                }
            }

            log_message('debug', 'Update Data: ' . json_encode($updateData));

            // Try using query builder directly instead of model update
            $updateResult = $this->db->table('facebook_conflicts')
                ->where('id', $conflictId)
                ->update($updateData);

            log_message('debug', 'Affected Rows: ' . $this->db->affectedRows());
            log_message('debug', 'Last Query: ' . $this->db->getLastQuery());

            if ($this->db->affectedRows() === 0) {
                // Check if record exists but nothing was changed
                $currentRecord = $this->db->table('facebook_conflicts')
                    ->where('id', $conflictId)
                    ->get()
                    ->getRowArray();

                log_message('debug', 'Current Record: ' . json_encode($currentRecord));

                if (!$currentRecord) {
                    throw new \Exception('Conflict record not found with ID: ' . $conflictId);
                }

                // If record exists but no rows affected, it might mean the data is the same
                // Let's continue as this might be okay
                log_message('debug', 'No rows affected - data might be identical');
            }

            // Handle territories update
            if ($territories) {
                // Parse territories if it's JSON string
                if (is_string($territories)) {
                    $territories = json_decode($territories, true);
                }

                log_message('debug', 'Parsed Territories: ' . json_encode($territories));

                if (is_array($territories) && !empty($territories)) {
                    // Delete existing territory associations for this conflict
                    $this->conflictCountryModel->where('conflict_id', $conflictId)->delete();

                    // Insert new territory associations
                    foreach ($territories as $countryId) {
                        if (!empty($countryId)) {
                            $this->conflictCountryModel->insert([
                                'conflict_id' => $conflictId,
                                'country_id' => (int)$countryId
                            ]);
                        }
                    }
                }
            }

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Resolution updated successfully'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Update Resolution Error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    // Show ownership data page
    public function ownershipIndex()
    {
        $data = $this->getOwnershipConflictsData();

        return view('superadmin/index', [
            'file_name' => 'ownership-data',
            'data'      => $data,
        ]);
    }

    /**
     * Return ownership conflicts data as JSON
     */
    public function listOwnershipConflictsJson()
    {
        $data = $this->getOwnershipConflictsData();

        $json = json_encode(['data' => $data], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        if ($json === false) {
            log_message('error', 'JSON encode failed in listOwnershipConflictsJson(): ' . json_last_error_msg());
            return $this->response->setJSON(['data' => []]);
        }

        return $this->response
            ->setHeader('Content-Type', 'application/json')
            ->setBody($json);
    }

    /**
     * Get formatted ownership conflicts data
     */
    private function getOwnershipConflictsData()
    {
        $facebookConflict = new FacebookConflictModel();
        $conflicts = $facebookConflict->whereIn('status', ['In Review', 'Rejected'])
            ->orderBy('id', 'DESC')
            ->findAll();

        $data = [];

        foreach ($conflicts as $conflict) {
            // Rights owned display
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
            foreach ($conflicts as $conflict) {
                // Get related countries
                $linkedCountries = $this->conflictCountryModel
                    ->select('countries.id, countries.name, countries.iso2, countries.continent')
                    ->join('countries', 'countries.id = conflict_countries.country_id')
                    ->where('conflict_countries.conflict_id', $conflict['id'])
                    ->findAll();

                // Group by continent
                $countriesGrouped = [];
                foreach ($linkedCountries as $c) {
                    $continent = $c['continent'] ?? 'Other';
                    if (!isset($countriesGrouped[$continent])) {
                        $countriesGrouped[$continent] = [];
                    }
                    $countriesGrouped[$continent][] = [
                        'id' => $c['id'],
                        'name' => $c['name'],
                        'iso2' => $c['iso2'],
                    ];
                }

                // Create a formatted country list for display purposes
                $countryDisplayText = '';
                foreach ($countriesGrouped as $continent => $countries) {
                    $countryDisplayText .= $continent . ":\n";
                    foreach ($countries as $country) {
                        $countryDisplayText .= "  • " . $country['name'] . "\n";
                    }
                    $countryDisplayText .= "\n";
                }

                $data[] = [
                    'id' => $conflict['id'],
                    'category' => $this->formatConflictCategory($conflict['conflict_category']),
                    'assetTitle' => $conflict['reference_copyright_title'],
                    'artist' => $conflict['reference_copyright_artist'],
                    'assetId' => $conflict['reference_asset_id'] ?? $conflict['reference_copyright_id'],
                    'upc' => $this->extractUPC($conflict),
                    'isrc' => $conflict['reference_copyright_isrc'],
                    'otherParty' => $conflict['other_party_name'],
                    'dailyViews' => $this->formatViewCount($conflict['last_28_days_view_count']),
                    'expiry' => $this->formatExpiryDate($conflict['conflict_expiration_date']),
                    'status' => $conflict['status'] ?? 'Action Required',

                    // Additional data for the form
                    'songName' => $conflict['reference_copyright_title'],
                    'artistName' => $conflict['reference_copyright_artist'],
                    'conflictState' => $conflict['conflict_state'],
                    'conflictCategory' => $conflict['conflict_category'],
                    'matchCount' => $conflict['reference_copyright_match_count'],

                    'questions' => [
                        'reference_id' => $conflict['reference_copyright_id'],
                        'asset_id' => $conflict['reference_asset_id'],
                        'overlap_percentage' => $conflict['reference_overlap_percentage'],
                        'overlap_duration' => $conflict['reference_overlap_duration_ms'],
                        'other_party_overlap' => $conflict['other_party_reference_overlap_percentage'],
                    ],
                    'countries' => $countriesGrouped,

                    // Resolution data for "In Review" status
                    'resolutionData' => [
                        'rightsOwned' => $conflict['resolution_rights_owned'] ?? '',
                        'rightsOwnedDisplay' => $rightsOwnedDisplay,
                        'resolutionDate' => $conflict['resolution_date'] ?? '',
                        'supportingDocumentPath' => base_url() .  $conflict['supporting_document_path'] ?? '',
                        'countryDisplayText' => trim($countryDisplayText),
                        'rejectionMessage' => $conflict['message'] ?? '',
                    ]
                ];
            }

            return $data;
        }
    }

    /**
     * Update ownership conflict status only
     */
    public function updateOwnership($id)
    {
        $status = $this->request->getPost('status');
        $rejectionMessage = $this->request->getPost('rejectionMessage');

        $data = [];

        if ($status !== null && $status !== '') {
            $data['status'] = $status;
        }

        if ($rejectionMessage !== null && $rejectionMessage !== '') {
            $data['message'] = $rejectionMessage;
        }

        if (empty($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No data provided for update.'
            ]);
        }

        log_message('debug', 'Data: ' . print_r($data, true));
        log_message('debug', 'ID: ' . $id);


        $this->facebookConflictModel->update($id, $data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ownership updated successfully.'
        ]);
    }





    public function import()
    {
        $file = $this->request->getFile('file');
        if (!$file || !$file->isValid()) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['status' => 'error', 'message' => 'No valid file uploaded']);
        }

        $uploadPath = WRITEPATH . 'uploads';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);
        $filePath = $uploadPath . DIRECTORY_SEPARATOR . $newName;

        if (($handle = fopen($filePath, 'r')) === false) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['status' => 'error', 'message' => 'Unable to read uploaded file']);
        }

        $headersRow = fgetcsv($handle);
        if ($headersRow === false) {
            fclose($handle);
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['status' => 'error', 'message' => 'CSV appears empty or invalid']);
        }

        // Map headers
        $headerIndex = [];
        foreach ($headersRow as $i => $h) {
            $k = strtolower(trim((string)$h));
            $headerIndex[$k] = $i;
        }

        $rowNumber = 1;
        $processed = 0;
        $inserted = 0;
        $errors = [];
        $missingCountries = [];

        $this->db->transStart();

        while (($row = fgetcsv($handle)) !== false) {
            $rowNumber++;
            if ($row === [null] || $row === false) {
                continue;
            }
            $processed++;

            $get = function (string $col) use ($headerIndex, $row) {
                $k = strtolower(trim($col));
                if (!isset($headerIndex[$k])) {
                    return null;
                }
                $idx = $headerIndex[$k];
                return isset($row[$idx]) ? trim((string)$row[$idx]) : null;
            };

            try {
                $created_by = session()->get('user')['id'] ?? null;

                $insertData = [
                    'reference_copyright_id' => $this->safeBigInt($get('reference_copyright_id')),
                    'reference_copyright_creation_date' => $this->safeDate($get('reference_copyright_creation_date')),
                    'reference_copyright_artist' => $get('reference_copyright_artist'),
                    'reference_copyright_title' => $get('reference_copyright_title'),
                    'reference_copyright_isrc' => $get('reference_copyright_isrc'),
                    'reference_copyright_match_count' => $this->safeInt($get('reference_copyright_match_count')),

                    'conflict_id' => $this->safeBigInt($get('conflict_id')),
                    'conflict_type' => $get('conflict_type'),
                    'conflict_creation_date' => $this->safeDate($get('conflict_creation_date')),
                    'conflict_modification_date' => $this->safeDate($get('conflict_modification_date')),
                    'conflict_state' => $get('conflict_state'),
                    'conflicting_territories' => $this->normalizeTerritories($get('conflicting_territories')),
                    'status' => 'Action Required', // Default status

                    'other_party_name' => $get('other_party_name'),
                    'other_party_reference_copyright_id' => $this->safeBigInt($get('other_party_reference_copyright_id')),
                    'other_party_reference_copyright_artist' => $get('other_party_reference_copyright_artist'),
                    'other_party_reference_copyright_title' => $get('other_party_reference_copyright_title'),
                    'other_party_reference_copyright_isrc' => $get('other_party_reference_copyright_isrc'),

                    'last_28_days_view_count' => $this->safeInt($get('last_28_days_view_count')),
                    'reference_overlap_percentage' => $this->safeDecimal($get('reference_overlap_percentage')),
                    'reference_overlap_duration_ms' => $this->safeBigInt($get('reference_overlap_duration_ms')),

                    'conflict_category' => $get('conflict_category'),
                    'reference_copyright_version_title' => $get('reference_copyright_version_title'),
                    'other_party_reference_copyright_version_title' => $get('other_party_reference_copyright_version_title'),
                    'conflict_expiration_date' => $this->safeDate($get('conflict_expiration_date')),

                    'reference_asset_id' => $this->safeBigInt($get('reference_asset_id')),
                    'other_party_reference_overlap_percentage' => $this->safeDecimal($get('other_party_reference_overlap_percentage')),
                    'other_party_reference_overlap_duration_ms' => $this->safeBigInt($get('other_party_reference_overlap_duration_ms')),
                    'created_by' => $created_by,
                ];

                // insert conflict
                $conflictDbId = $this->facebookConflictModel->insert($insertData, true);

                if ($conflictDbId) {
                    $inserted++;
                    $territoriesRaw = $insertData['conflicting_territories'] ?? '';
                    if (!empty($territoriesRaw)) {
                        $codes = preg_split('/[\s,;|]+/', $territoriesRaw, -1, PREG_SPLIT_NO_EMPTY);
                        foreach ($codes as $code) {
                            $iso2 = strtoupper(trim($code));
                            if ($iso2 === '') continue;

                            $country = $this->countryModel->where('iso2', $iso2)->first();
                            if ($country) {
                                $this->conflictCountryModel->insert([
                                    'conflict_id' => $conflictDbId,
                                    'country_id' => $country['id'],
                                ]);
                            } else {
                                $missingCountries[] = ['row' => $rowNumber, 'iso' => $iso2];
                            }
                        }
                    }
                } else {
                    $errors[] = ['row' => $rowNumber, 'message' => 'Insert failed'];
                }
            } catch (\Throwable $ex) {
                $errors[] = ['row' => $rowNumber, 'message' => $ex->getMessage()];
            }
        }

        $this->db->transComplete();
        fclose($handle);

        return $this->response->setJSON([
            'status' => 'success',
            'file' => $file->getClientName(),
            'processed_rows' => $processed,
            'inserted_rows' => $inserted,
            'missing_country_mappings' => $missingCountries,
            'errors' => $errors,
        ]);
    }
    /* ------------------- Helper Methods ------------------- */

    private function formatConflictCategory($category)
    {
        if (empty($category)) return 'Unknown';
        return ucwords(str_replace('_', ' ', $category));
    }

    private function formatViewCount($count)
    {
        if (!$count) return '0';

        $count = (int)$count;
        if ($count >= 1000000) {
            return round($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return round($count / 1000, 1) . 'K';
        }

        return (string)$count;
    }

    private function formatExpiryDate($date)
    {
        if (!$date) return '-';

        $expiryDate = new \DateTime($date);
        $now = new \DateTime();
        $diff = $now->diff($expiryDate);

        if ($expiryDate < $now) {
            return 'Expired';
        }

        if ($diff->days == 0) {
            return 'Today';
        } elseif ($diff->days == 1) {
            return '1 day';
        } else {
            return $diff->days . ' days';
        }
    }

    private function extractUPC($conflict)
    {
        return $conflict['reference_copyright_isrc'] ?? 'N/A';
    }

    private function uploadSupportingDocument($file)
    {
        // Save directly inside public/uploads/supporting_docs
        $uploadPath = FCPATH . 'uploads/supporting_docs';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $newName = time() . '_' . $file->getRandomName();
        $file->move($uploadPath, $newName);

        // Return relative public URL path
        return 'uploads/supporting_docs/' . $newName;
    }

    private function safeInt($v)
    {
        $v = trim((string)$v);
        if ($v === '' || $v === null) return null;
        $v = str_replace([',', ' '], '', $v);
        if (!is_numeric($v)) return null;
        return (int)$v;
    }

    private function safeBigInt($v)
    {
        $v = trim((string)$v, " '");
        if ($v === '') return null;
        return $v;
    }

    private function safeDecimal($v)
    {
        $v = trim((string)$v);
        if ($v === '' || $v === null) return null;
        $v = str_replace(',', '.', $v);
        $v = preg_replace('/[^0-9\.\-]+/', '', $v);
        if ($v === '' || !is_numeric($v)) return null;
        return number_format((float)$v, 2, '.', '');
    }

    private function safeDate($v)
    {
        $v = trim((string)$v);
        if ($v === '' || $v === null) return null;
        $ts = strtotime($v);
        return $ts ? date('Y-m-d H:i:s', $ts) : null;
    }

    private function normalizeTerritories($cell)
    {
        if ($cell === null) return null;
        $cell = trim((string)$cell);
        if ($cell === '') return null;

        $parts = preg_split('/[\s,;|]+/', $cell, -1, PREG_SPLIT_NO_EMPTY);
        $normalized = [];
        foreach ($parts as $p) {
            $code = strtoupper(trim($p));
            if ($code !== '') $normalized[] = $code;
        }
        return implode(',', array_unique($normalized));
    }
}
