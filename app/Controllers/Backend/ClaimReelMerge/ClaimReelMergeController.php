<?php

namespace App\Controllers\Backend\ClaimReelMerge;

use App\Controllers\BaseController;
use App\Repositories\ClaimReelMerge\ClaimReelMergeRepository;
use App\Models\Backend\ReleaseModel;
use App\Models\Backend\ClaimReelMergeModel;

class ClaimReelMergeController extends BaseController
{
    protected $claimRepo;
    protected $releaseModel;

    public function __construct()
    {
        $this->claimRepo = new ClaimReelMergeRepository();
        $this->releaseModel = new ReleaseModel();
    }

    public function index()
    {
        $releases = $this->releaseModel
            ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_artists.name as artist_name')
            ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
            ->findAll();

        return view('superadmin/index', [
            'file_name' => 'merge-req',
            'releases'  => $releases,
        ]);
    }

    public function store()
    {
        $releaseId = $this->request->getPost('release_id');

        $release = $this->releaseModel
            ->select('g_release.title, g_release.isrc, g_release.upc_ean, g_artists.name as artist_name')
            ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
            ->find($releaseId);

        if (!$release) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Selected song not found'
            ]);
        }

        $data = [
            'release_id'      => $releaseId,
            'song_name'       => $release['title'],
            'artist_name'     => $release['artist_name'],
            'isrc'            => $release['isrc'],
            'upc'             => $release['upc_ean'],
            'instagram_audio' => $this->request->getPost('instagram_audio'),
            'reel_merge'      => $this->request->getPost('reel_merge'),
            'matching_time'   => $this->request->getPost('matching_time'),
            'status'          => 'Pending',
        ];

        $this->claimRepo->create($data);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Claim/Reel Merge Request submitted successfully'
        ]);
    }

    public function list()
    {
        try {
            $model = new ClaimReelMergeModel();
            $rows = $model->findAll();
            $data = array_map(function ($r) {
                return [
                    'id'             => (int) $r['id'],
                    'song_name'      => $r['song_name'] ?? 'Unknown',
                    'artist_name'    => $r['artist_name'] ?? 'Unknown',
                    'isrc'           => $r['isrc'] ?? 'N/A',
                    'upc'            => $r['upc'] ?? 'N/A',
                    'instagram_audio' => $r['instagram_audio'] ?? '',
                    'reel_merge'     => $r['reel_merge'] ?? '',
                    'matching_time'  => $r['matching_time'] ?? '',
                    'status'         => $r['status'] ?? 'Pending',
                    'created_at'     => $r['created_at'] ?? null,
                    'updated_at'     => $r['updated_at'] ?? null,
                ];
            }, $rows);

            return $this->response->setJSON([
                'success' => true,
                'data'    => $data,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Claim Merge list error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to fetch claim requests',
            ]);
        }
    }

    // Page for Claim Reel Merge Data
    public function mergeData()
    {
        return view('superadmin/index', [
            'file_name' => 'merge-data',
            'title'     => 'Claim Reel Merge Data Management'
        ]);
    }

    // List all merge requests (DataTable JSON)
    public function getMergeDataJson()
    {
        try {
            $model = new ClaimReelMergeModel();

            $rows = $model->select('id, song_name, artist_name, isrc, instagram_audio, reel_merge, matching_time, status, created_at, updated_at')
                ->orderBy('created_at', 'DESC')
                ->findAll();

            $data = array_map(function ($r) {
                return [
                    'id'             => (int) $r['id'],
                    'songName'       => $r['song_name'] ?? 'Unknown Song',
                    'artist'         => $r['artist_name'] ?? 'Unknown Artist',
                    'isrc'           => $r['isrc'] ?? 'N/A',
                    'instagramAudio' => $r['instagram_audio'] ?? '',
                    'reelMerge'      => $r['reel_merge'] ?? '',
                    'matchingTime'   => $r['matching_time'] ?? '',
                    'status'         => $r['status'] ?? 'pending',
                    'artwork'        => base_url('assets/images/default-artwork.jpg'),
                    'created_at'     => $r['created_at'],
                    'updated_at'     => $r['updated_at'],
                ];
            }, $rows);

            return $this->response->setJSON(['data' => $data]);
        } catch (\Throwable $e) {
            log_message('error', 'getMergeDataJson error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['data' => []]);
        }
    }

    // Detail of one merge request
    public function getMergeDataDetail($id)
    {
        try {
            $model = new ClaimReelMergeModel();
            $request = $model->find($id);
            if (!$request) {
                return $this->response->setStatusCode(404)->setJSON(['success' => false, 'error' => 'Request not found']);
            }

            $data = [
                'id'             => (int) $request['id'],
                'songName'       => $request['song_name'] ?? 'Unknown Song',
                'artist'         => $request['artist_name'] ?? 'Unknown Artist',
                'isrc'           => $request['isrc'] ?? 'N/A',
                'instagramAudio' => $request['instagram_audio'] ?? '',
                'reelMerge'      => $request['reel_merge'] ?? '',
                'matchingTime'   => $request['matching_time'] ?? '',
                'status'         => $request['status'] ?? 'pending',
                'artwork'        => base_url('assets/images/default-artwork.jpg'),
            ];

            return $this->response->setJSON(['success' => true, 'data' => $data]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'error' => 'Failed to fetch request details']);
        }
    }

    // Update merge request status
    public function updateMergeStatus($id)
    {
        try {
            $model = new ClaimReelMergeModel();

            $input = $this->request->getJSON();
            if (!$input || !isset($input->status)) {
                return $this->response->setStatusCode(400)->setJSON(['success' => false, 'error' => 'Status is required']);
            }

            $status = strtolower(trim($input->status));
            if (!in_array($status, ['pending', 'approved', 'rejected'])) {
                return $this->response->setStatusCode(400)->setJSON(['success' => false, 'error' => 'Invalid status']);
            }

            $updated = $model->update($id, [
                'status'     => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            if (!$updated) {
                throw new \Exception('Failed to update status');
            }

            return $this->response->setJSON(['success' => true, 'message' => "Status updated to {$status}"]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'error' => 'Failed to update status']);
        }
    }
}
