<?php

namespace App\Controllers\Backend\Label;

use App\Controllers\BaseController;
use App\Repositories\Label\LabelRepository;

class LabelController extends BaseController
{
    protected $labelRepo;

    public function __construct()
    {
        $this->labelRepo = new LabelRepository();
    }

    /**
     * List all labels with pagination
     */
    public function index()
    {
        $data['labels'] = $this->labelRepo->findAll();

        $session = session();
        $user = $session->get('user');

        $userModel = new \App\Models\UserModel();
        $primaryLabels = $userModel->select('id, primary_label_name')
            ->where('primary_label_name IS NOT NULL')
            ->findAll();

        $page_array = [
            'file_name' => 'labels',
            'data' => $data,
            'primaryLabels' => $primaryLabels,
            'user' => $user,
        ];

        return view('superadmin/index', $page_array);
    }

    /**
     * Store a new label
     */
    public function store()
    {
        $validationRules = [
            'label_name'   => 'required|min_length[2]|max_length[255]',
            // 'primary_label' => 'required|min_length[2]|max_length[255]',
            'logo'         => 'uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $session = session();
        $user    = $session->get('user');

        $primaryLabelName = $this->request->getPost('primary_label_name');

        $userModel = new \App\Models\UserModel();
        $userRow   = $userModel->where('primary_label_name', $primaryLabelName)->first();

        $data = [
            'label_name'         => $this->request->getPost('label_name'),
            'primary_label_name' => $primaryLabelName,
            'user_id'            => $userRow ? $userRow['id'] : null,
        ];

        // Handle image upload
        $img = $this->request->getFile('logo');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/label', $newName);
            $data['logo'] = 'uploads/label/' . $newName;
        }

        $this->labelRepo->create($data);

        return redirect()->back()->with('success', 'Label created successfully');
    }


    public function getLabelsJson()
    {
        $labels = $this->labelRepo->findAll(); // or paginate if needed

        $data = [];
        foreach ($labels as $label) {
            $data[] = [
                'id'            => $label['id'],
                'name'          => $label['label_name'],
                'logo'          => !empty($label['logo']) ? base_url($label['logo']) : base_url('images/default.png'),
                'release_count' => $label['release_count'] ?? 0,
            ];
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }
}
