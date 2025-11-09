<?php

namespace App\Controllers\Backend\RelocationRequest;

use App\Controllers\BaseController;
use App\Models\Backend\RelocationRequestModel;
use App\Models\Backend\ReleaseModel;

class RelocationRequestController extends BaseController
{
    protected $relocationModel;
    protected $releaseModel;

    public function __construct()
    {
        $this->relocationModel = new RelocationRequestModel();
        $this->releaseModel         = new ReleaseModel();
    }

    public function index()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'];
        $userRole = $user['role_id'] ?? 3;
        $userPrimaryLabel = $user['primary_label_name'] ?? '';

        if (in_array($userRole, [1, 2])) {
            $releases = $this->releaseModel
                ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_release.artist_id as artist_name')
                ->where('g_release.status', 3) // Only delivered releases
                ->findAll();
        } else {
            $releases = $this->releaseModel
                ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_release.artist_id as artist_name')
                ->join('g_labels', 'g_labels.id = g_release.label_id', 'left')
                ->where('g_release.status', 3) // Only delivered releases
                ->groupStart()
                ->where('g_release.created_by', $userId)
                ->orWhere('g_labels.primary_label_name', $userPrimaryLabel)
                ->groupEnd()
                ->findAll();
        }

        return view('superadmin/index', [
            'file_name' => 'relocation-req',
            'releases'  => $releases,
        ]);
    }

    public function getRelocationRequestJson()
    {
        $session = session();
        $user = $session->get('user');
        $userId = $user['id'];
        $userRole = $user['role_id'] ?? 3;

        if (in_array($userRole, [1, 2])) {
            $rows = $this->relocationModel
                ->select('id, song_name, artist_name, isrc, instagram_link, instagram_audio, facebook_link, status')
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $rows = $this->relocationModel
                ->select('id, song_name, artist_name, isrc, instagram_link, instagram_audio, facebook_link, status')
                ->where('created_by', $userId)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        $data = array_map(function ($r) {
            return [
                'id'              => (string) $r['id'],
                'title'           => $r['song_name'] ?? null,
                'artist'          => $r['artist_name'] ?? null,
                'isrc'            => $r['isrc'] ?? 'N/A',
                'instagram_link'  => $r['instagram_link'] ?? '',
                'instagram_audio' => $r['instagram_audio'] ?? '',
                'facebook_link'   => $r['facebook_link'] ?? '',
                'status'          => $r['status'] ?? 'Pending',
            ];
        }, $rows);

        return $this->response->setJSON(['data' => $data]);
    }

    public function list()
    {
        $data = $this->relocationModel->findAll();
        return $this->response->setJSON(['data' => $data]);
    }

    public function store()
    {
        $releaseId = $this->request->getPost('release_id');

        $release = $this->releaseModel
            ->select('g_release.title, g_release.isrc, g_release.artist_id as artist_name')
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
            'instagram_link'  => $this->request->getPost('instagram_link'),
            'instagram_audio' => $this->request->getPost('instagram_audio'),
            'facebook_link'   => $this->request->getPost('facebook_link'),
            'status'          => 'Pending',
            'created_by'      => session()->get('user')['id'],
        ];

        $this->relocationModel->save($data);

        return redirect()->back()->with('success', 'Relocation Request submitted successfully');
    }

    // public function updateStatus($id)
    // {
    //     $status = $this->request->getPost('status');
    //
    //     $this->relocationModel->update($id, ['status' => $status]);
    //
    //     return $this->response->setJSON(['message' => 'Status updated']);
    // }

    public function relocationData()
    {
        return view('superadmin/index', [
            'file_name' => 'relocation-data',
            'title'     => 'Relocation Data Management'
        ]);
    }

    public function getRelocationDataJson()
    {
        try {
            $rows = $this->relocationModel
                ->select('id, song_name, artist_name, isrc, instagram_link, instagram_audio, facebook_link, status, created_at, updated_at')
                ->orderBy('created_at', 'DESC')
                ->findAll();

            $data = array_map(function ($r) {
                return [
                    'id'             => (int) $r['id'],
                    'songName'       => $r['song_name'] ?? 'Unknown Song',
                    'artist'         => $r['artist_name'] ?? 'Unknown Artist',
                    'isrc'           => $r['isrc'] ?? 'N/A',
                    'instagramAudio' => $r['instagram_audio'] ?? '',
                    'instagramLink'  => $r['instagram_link'] ?? '',
                    'facebookLink'   => $r['facebook_link'] ?? '',
                    'status'         => $r['status'] ?? 'pending',
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
            log_message('error', 'getRelocationDataJson error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to fetch relocation data',
            ]);
        }
    }

    public function getRelocationDataDetail($id)
    {
        try {
            $request = $this->relocationModel->find($id);

            if (!$request) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'error'   => 'Request not found',
                ]);
            }

            log_message('debug', 'Raw request data: ' . print_r($request, true));

            $data = [
                'id'             => (int) $request['id'],
                'songName'       => $request['song_name'] ?? 'Unknown Song',
                'artist'         => $request['artist_name'] ?? 'Unknown Artist',
                'isrc'           => $request['isrc'] ?? 'N/A',
                'instagramAudio' => $request['instagram_audio'] ?? '',
                'instagramLink'  => $request['instagram_link'] ?? '',
                'facebookLink'   => $request['facebook_link'] ?? '',
                'reelMerge'      => $request['reel_merge_link'] ?? '',
                'matchingTime'   => $request['matching_time'] ?? '',
                'status'         => $request['status'] ?? 'pending',
                'artwork'        => base_url('assets/images/default-artwork.jpg'),
            ];

            log_message('debug', 'Formatted data being sent: ' . print_r($data, true));

            return $this->response->setJSON([
                'success' => true,
                'data'    => $data,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'getRelocationDataDetail error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to fetch request details',
            ]);
        }
    }

    public function updateRelocationStatus($id)
    {
        try {
            $input = $this->request->getJSON();

            if (!$input || !isset($input->status)) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success' => false,
                    'error'   => 'Status is required',
                ]);
            }

            $status = strtolower(trim($input->status));

            if (!in_array($status, ['pending', 'approved', 'rejected'])) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success' => false,
                    'error'   => 'Invalid status',
                ]);
            }

            $updated = $this->relocationModel->update($id, [
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            if (!$updated) {
                throw new \Exception('Failed to update status');
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => "Status updated to {$status} successfully",
            ]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'error'   => 'Failed to update status',
            ]);
        }
    }
}
