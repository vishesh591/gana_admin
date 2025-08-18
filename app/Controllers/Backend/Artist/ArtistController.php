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
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('artist_name'),
            'spotify_id'  => $this->request->getPost('spotify_id'),
            'apple_id'    => $this->request->getPost('apple_id'),
        ];

        // Handle image upload
        $img = $this->request->getFile('profile_image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/artist', $newName);
            $data['profile_image'] = 'uploads/artist/' . $newName;
        }

        $this->artistRepo->create($data);

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
}
