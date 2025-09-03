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
        $releases = $this->releaseModel
            ->select('g_release.id, g_release.title, g_release.upc_ean, g_release.isrc, g_artists.name as artist_name')
            ->join('g_artists', 'g_artists.id = g_release.artist_id', 'left')
            ->findAll();

        return view('superadmin/index', [
            'file_name' => 'relocation-req',
            'releases'  => $releases,
        ]);
    }

    public function getRelocationRequestJson()
    {
        $rows = $this->relocationModel
            ->select('id, song_name, artist_name, isrc, status')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data = array_map(function ($r) {
            return [
                'id'     => (string) $r['id'],
                'title'  => $r['song_name'] ?? null,
                'artist' => $r['artist_name'] ?? null,
                'isrc'   => $r['isrc'] ?? 'N/A',
                'upc'    => $r['upc'] ?? 'N/A',
                'status' => $r['status'] ?? 'Pending',
            ];
        }, $rows);

        return $this->response->setJSON(['data' => $data]);
    }
    // API for datatable
    public function list()
    {
        $data = $this->relocationModel->findAll();
        return $this->response->setJSON(['data' => $data]);
    }

public function store()
{
    $releaseId = $this->request->getPost('release_id');

    $release = $this->releaseModel
        ->select('g_release.title, g_release.isrc, g_artists.name as artist_name')
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
        'instagram_link'  => $this->request->getPost('instagram_link'),
        'instagram_audio' => $this->request->getPost('instagram_audio'),
        'facebook_link'   => $this->request->getPost('facebook_link'),
        'status'          => 'Pending'
    ];

    $this->relocationModel->save($data);

    return redirect()->back()->with('success', 'Relocation Request submitted successfully');
}


    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');

        $this->relocationModel->update($id, ['status' => $status]);

        return $this->response->setJSON(['message' => 'Status updated']);
    }
}
