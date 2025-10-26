<?php

namespace App\Controllers\Backend\ClaimingRequest;

use App\Controllers\BaseController;
use App\Repositories\ClaimingRequest\ClaimingRequestRepository;
use App\Models\Backend\ClaimingRequestModel;   // <-- add
use App\Models\Backend\ReleaseModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClaimingRequestController extends BaseController
{
    protected $claimingRequestRepo;
    protected $releaseModel;

    // ADD: strongly-typed model so we don't call undefined property
    protected $claimingRequestModel;

    public function __construct()
    {
        $this->claimingRequestRepo  = new ClaimingRequestRepository();
        $this->releaseModel         = new ReleaseModel();
        $this->claimingRequestModel = new ClaimingRequestModel(); // <-- init it
    }

    public function index()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'];
        $userRole = $user['role_id'] ?? 3;

        if (in_array($userRole, [1, 2])) {
            $releases = $this->releaseModel
                ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_artists.name as artist_name')
                ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
                ->where('g_release.status', 3) // Only delivered releases
                ->findAll();
        } else {
            $releases = $this->releaseModel
                ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_artists.name as artist_name')
                ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
                ->where('g_release.created_by', $userId)
                ->where('g_release.status', 3) // Only delivered releases
                ->findAll();
        }

        return view('superadmin/index', [
            'file_name' => 'claiming-req',
            'releases'  => $releases,
        ]);
    }


    // DataTable for the “Claiming Request” page (simple list)
    public function getClaimingRequestJson()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'];
        $userRole = $user['role_id'] ?? 3;

        // Admins and superadmins view all claims, others view their own
        if (in_array($userRole, [1, 2])) {
            $rows = $this->claimingRequestModel
                ->select('id, song_name, artist_name, upc, isrc, status, video_links, removal_reason')
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $rows = $this->claimingRequestModel
                ->select('id, song_name, artist_name, upc, isrc, status, video_links, removal_reason')
                ->where('created_by', $userId)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        $data = array_map(function ($r) {
            return [
                'id'            => (string) $r['id'],
                'title'         => $r['song_name'] ?? null,
                'artist'        => $r['artist_name'] ?? null,
                'isrc'          => $r['isrc'] ?? 'N/A',
                'upc'           => $r['upc'] ?? 'N/A',
                'status'        => $r['status'] ?? 'Pending',
                'videoLinks'    => $this->parseVideoLinks($r['video_links'] ?? ''),
                'removalReason' => $r['removal_reason'] ?? 'N/A',
            ];
        }, $rows);

        return $this->response->setJSON(['data' => $data]);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'songName'  => 'required',
            'videoLink' => 'permit_empty',
            'reason'    => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $validation->getErrors()
            ]);
        }

        // You were treating "songName" as release_id; keeping that, but fetch actual cols
        $releaseId = $this->request->getPost('songName');
        $release   = $this->releaseModel
            ->select('g_release.title, g_release.upc_ean, g_release.isrc, g_artists.name as artist_name')
            ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
            ->find($releaseId);

        if (!$release) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Selected song not found'
            ]);
        }

        $data = [
            'song_name'      => $release['title'] ?? '',
            'artist_name'    => $release['artist_name'] ?? '',
            'upc'            => $release['upc_ean'] ?? '',
            'isrc'           => $release['isrc'] ?? '',
            'video_links'    => $this->request->getPost('videoLink'),
            'removal_reason' => $this->request->getPost('reason'),
            'status'         => 'Pending',
            'created_by'     => session()->get('user')['id'],
        ];

        $this->claimingRequestRepo->create($data);

        return redirect()->to('/claiming-request')
            ->with('success', 'Claiming Request created successfully');
    }

    public function claimData()
    {
        // page scaffold for the DataTable + modal
        return view('superadmin/index', [
            'file_name' => 'claiming-data',
            'title'     => 'Claiming Data Management'
        ]);
    }

    // Data for the “Claiming Data” page (no joins; use your claiming_requests schema)
    public function getClaimingDataJson()
    {
        try {
            $rows = $this->claimingRequestModel
                ->select('id, song_name, artist_name, upc, isrc, video_links, removal_reason, status, created_at, updated_at')
                ->orderBy('created_at', 'DESC')
                ->findAll();

            $data = array_map(function ($r) {
                return [
                    'id'             => (int) $r['id'],
                    'songName'       => $r['song_name'] ?? 'Unknown Song',
                    'artist'         => $r['artist_name'] ?? 'Unknown Artist',
                    'upc'            => $r['upc'] ?? 'N/A',
                    'isrc'           => $r['isrc'] ?? 'N/A',
                    'videoLinks'     => $this->parseVideoLinks($r['video_links'] ?? ''), // convert to array
                    'removalReason'  => $r['removal_reason'] ?? 'N/A',
                    'status'         => $this->getStatusText($r['status']),
                    'artwork'        => base_url('assets/images/default-artwork.jpg'),
                    'created_at'     => $r['created_at'],
                    'updated_at'     => $r['updated_at'],
                ];
            }, $rows);

            return $this->response->setJSON([
                'success' => true,
                'data'    => $data,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'getClaimingDataJson error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to fetch claiming data',
            ]);
        }
    }

    /**
     * Convert a stored text (comma/line separated) into array of links
     */
    private function parseVideoLinks(string $links): array
    {
        return array_filter(array_map('trim', preg_split('/[\r\n,]+/', $links)));
    }


    public function updateStatus($id)
    {
        try {
            $claim = $this->claimingRequestModel->find($id);
            if (!$claim) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'error'   => 'Claiming request not found',
                ]);
            }

            // Accept JSON or form
            $payload   = $this->request->getJSON(true) ?? $this->request->getPost();
            $newStatus = $payload['status'] ?? null;

            // Your DB enum uses capitalized: Pending / Approved / Rejected
            $map = [
                'pending'  => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
                'Pending'  => 'Pending',
                'Approved' => 'Approved',
                'Rejected' => 'Rejected',
            ];
            if (!isset($map[$newStatus])) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success' => false,
                    'error'   => 'Invalid status value',
                ]);
            }

            $this->claimingRequestModel->update($id, [
                'status'     => $map[$newStatus],
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status updated',
                'status'  => $map[$newStatus],
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'updateStatus error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to update status',
            ]);
        }
    }

    private function getStatusText($status)
    {
        $map = [
            'Pending'  => 'Pending',
            'Approved' => 'Approved',
            'Rejected' => 'Rejected',
            'pending'  => 'pending',
            'approved' => 'approved',
            'rejected' => 'rejected',
            1          => 'pending',
            2          => 'approved',
            3          => 'rejected',
        ];
        return $map[$status] ?? 'pending';
    }
}
