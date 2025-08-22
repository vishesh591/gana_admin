<?php

namespace App\Controllers\Backend\Artist;

use App\Controllers\BaseController;
use App\Repositories\Artist\ArtistRepository;

class ArtistController extends BaseController
{
    protected $artistRepo;

    public function __construct()
    {
        $this->artistRepo = new ArtistRepository();
    }

    public function store()
    {
        $validationRules = [
            'artist_name'   => 'required|min_length[2]|max_length[255]',
            'spotify_id'    => 'permit_empty|max_length[255]',
            'apple_id'      => 'permit_empty|max_length[255]',
            'profile_image' => 'uploaded[profile_image]|is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors'  => $errors
                ]);
            }

            return redirect()->back()->withInput()->with('errors', $errors);
        }


        $data = [
            'name'        => $this->request->getPost('artist_name'),
            'spotify_id'  => $this->request->getPost('spotify_id'),
            'apple_id'    => $this->request->getPost('apple_id'),
        ];

        $img = $this->request->getFile('profile_image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/artist', $newName);
            $data['profile_image'] = 'uploads/artist/' . $newName;
        }

        $this->artistRepo->create($data);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Artist created successfully'
            ]);
        }

        return redirect()->back()->with('success', 'Artist created successfully');
    }


    public function index()
    {
        $data['artists'] = $this->artistRepo->findAll();

        $page_array = [
            'file_name' => 'artists',
            'data' => $data
        ];

        return view('superadmin/index', $page_array);
    }

    public function getArtistsJson()
    {
        $artists = $this->artistRepo->findAll();
        $data = array_map(function ($artist) {
            return [
                'id'            => $artist['id'],
                'name'          => $artist['name'],
                'profile_image' => !empty($artist['profile_image'])
                    ? base_url($artist['profile_image'])
                    : '/images/default.png',
                'release_count' => $artist['release_count'] ?? 0,
            ];
        }, $artists);

        return $this->response->setJSON(['data' => $data]);
    }
}
