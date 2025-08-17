<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Repositories\ReleaseRepository;
use CodeIgniter\Exceptions\PageNotFoundException;

class ReleaseController extends BaseController
{
    protected $releaseRepo;

    public function __construct()
    {
        $this->releaseRepo = new ReleaseRepository();
    }

    // Show all releases (paginated)
    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $data['releases'] = $this->releaseRepo->paginate(10, 'default', $page);
        $data['pager'] = $this->releaseRepo->getPager();

        return view('superadmin/releases/index', $data);
    }

    // Show create form
    public function create()
    {
        return view('superadmin/releases/create');
    }

    // Store release
    public function store()
    {
        $validationRules = [
            'title'        => 'required|min_length[3]|max_length[255]',
            'label_id'     => 'required|is_natural_no_zero',
            'release_type' => 'required',
            'genre_type'   => 'required',
            'artwork'      => 'uploaded[artwork]|is_image[artwork]|max_size[artwork,2048]',
            'audio_file'   => 'uploaded[audio_file]|max_size[audio_file,10240]',
            'release_date' => 'required|valid_date[Y-m-d]',
        ];

        if (! $this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle artwork upload
        $artworkFile = $this->request->getFile('artwork');
        $artworkName = null;
        if ($artworkFile->isValid()) {
            $artworkName = $artworkFile->getRandomName();
            $artworkFile->move(FCPATH . 'uploads/artworks', $artworkName);
        }

        // Handle audio upload
        $audioFile = $this->request->getFile('audio_file');
        $audioName = null;
        if ($audioFile->isValid()) {
            $audioName = $audioFile->getRandomName();
            $audioFile->move(FCPATH . 'uploads/audio', $audioName);
        }

        // Collect data
        $releaseData = [
            'title'        => $this->request->getPost('title'),
            'label_id'     => $this->request->getPost('label_id'),
            'release_type' => $this->request->getPost('release_type'),
            'mood_type'    => $this->request->getPost('mood_type'),
            'genre_type'   => $this->request->getPost('genre_type'),
            'upc_ean'      => $this->request->getPost('upc_ean'),
            'language'     => $this->request->getPost('language'),
            'artwork'      => $artworkName,
            'track_title'  => $this->request->getPost('track_title'),
            'audio_file'   => $audioName,
            'release_date' => $this->request->getPost('release_date'),
            'pre_sale_date'=> $this->request->getPost('pre_sale_date'),
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        $this->releaseRepo->create($releaseData);

        return redirect()->to('/superadmin/releases')
                         ->with('success', 'Release created successfully');
    }
}
