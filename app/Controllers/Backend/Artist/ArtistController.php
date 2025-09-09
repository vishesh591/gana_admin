<?php

namespace App\Controllers\Backend\Artist;

use App\Controllers\BaseController;
use App\Repositories\Artist\ArtistRepository;
use App\Services\SpotifyService;

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
            'spotify_id'    => 'permit_empty_spotify_artist',
            'apple_id'      => 'permit_empty_apple_artist',
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

        // Get the Spotify ID from the form submission
        $spotifyId = $this->request->getPost('spotify_id');

        $data = [
            'name'        => $this->request->getPost('artist_name'),
            'spotify_id'  => $spotifyId, // Use the actual Spotify ID, not empty string
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

    /**
     * AJAX endpoint to validate Spotify artist (optional for real-time validation)
     */
    public function searchSpotifyArtists()
    {
        $query = $this->request->getPost('query');

        if (empty($query) || strlen($query) < 2) {
            return $this->response->setJSON([
                'success' => false,
                'data' => [],
                'error' => 'Please enter at least 2 characters'
            ]);
        }

        $spotifyService = new SpotifyService();
        $result = $spotifyService->searchArtists($query, 10);

        return $this->response->setJSON($result);
    }

    public function searchAppleMusicArtists()
    {
        $query = $this->request->getPost('query');

        if (empty($query) || strlen($query) < 2) {
            return $this->response->setJSON([
                'success' => false,
                'data' => [],
                'error' => 'Please enter at least 2 characters'
            ]);
        }

        $spotifyService = new SpotifyService();
        $result = $spotifyService->searchAppleMusicArtists($query, 10);

        return $this->response->setJSON($result);
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
