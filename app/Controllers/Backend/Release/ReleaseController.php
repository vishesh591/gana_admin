<?php

namespace App\Controllers\Backend\Release;

use App\Controllers\BaseController;
use App\Repositories\Releases\ReleaseRepository;
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
        // --- DEBUG: Validation temporarily skipped ---
        /*
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
        // DEBUG: print errors
        dd($this->validator->getErrors());
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    */

        $artworkFile = $this->request->getFile('artworkFile');
        $artworkName = null;
        if ($artworkFile && $artworkFile->isValid()) {
            $artworkName = $artworkFile->getRandomName();
            $artworkFile->move(FCPATH . 'uploads/artworks', $artworkName);
        }

        $audioFile = $this->request->getFile('audioFile');
        $audioName = null;
        if ($audioFile && $audioFile->isValid()) {
            $audioName = $audioFile->getRandomName();
            $audioFile->move(FCPATH . 'uploads/audio', $audioName);
        }

        $releaseData = [
            'title'                     => $this->request->getPost('releaseTitle'),
            'label_id'                  => $this->request->getPost('labelName'),
            'artist_id'                 => $this->request->getPost('artist'),
            'featured_artists'         => $this->request->getPost('featured_artists'),
            'release_type'              => $this->request->getPost('releaseType'),
            'mood_type'                 => $this->request->getPost('mood'),
            'genre_type'                => $this->request->getPost('genre'),
            'upc_ean'                   => $this->request->getPost('upcEan'),
            'language'                  => $this->request->getPost('language'),
            'artwork'                   => $artworkName,
            'track_title'               => $this->request->getPost('trackTitle'),
            'secondary_track_type'      => $this->request->getPost('secondaryTrackType'),
            'instrumental'              => $this->request->getPost('instrumental'),
            'isrc'                      => $this->request->getPost('isrc'),
            'author'                    => $this->request->getPost('author'),
            'composer'                  => $this->request->getPost('composer'),
            'remixer'                   => $this->request->getPost('remixer'),
            'arranger'                  => $this->request->getPost('arranger'),
            'music_producer'            => $this->request->getPost('producer'),
            'publisher'                 => $this->request->getPost('publisher'),
            'c_line_year'               => $this->request->getPost('cLineYear'),
            'c_line'                    => $this->request->getPost('cLine'),
            'p_line_year'               => $this->request->getPost('pLineYear'),
            'p_line'                    => $this->request->getPost('pLine'),
            'production_year'           => $this->request->getPost('productionYear'),
            'track_title_language'      => $this->request->getPost('trackLanguage'),
            'explicit_song'             => $this->request->getPost('explicit'),
            'lyrics'                    => $this->request->getPost('lyrics'),
            'audio_file'                => $audioName,
            'release_date' => $this->request->getPost('release_date'),
            'stores_ids' => json_encode($this->request->getPost('stores') ?? []),
            'rights_management_options' => json_encode($this->request->getPost('rights') ?? []),

            'pre_sale_date'             => $this->request->getPost('pre_sale_date'),
            'original_release_date'     => $this->request->getPost('original_release_date'),
            'release_price'             => $this->request->getPost('release_price'),
            'sale_price'                => $this->request->getPost('sale_price'),
            't_and_c'                   => $this->request->getPost('t_and_c'), //lets have this as a boolean yes and no only
            'created_at'                => date('Y-m-d H:i:s'),
            'updated_at'                => date('Y-m-d H:i:s'),
        ];

        // Save release
        $this->releaseRepo->create($releaseData);

        return redirect()->to('/superadmin/releases')
            ->with('success', 'Release created successfully');
    }
}
