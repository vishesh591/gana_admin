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
        $data['labels'] = $this->labelRepo->getPaginated(3);
        return view('superadmin/labels', $data);
    }

    /**
     * Store a new label
     */
    public function store()
    {
        $validationRules = [
            'label_name'   => 'required|min_length[2]|max_length[255]',
            'primary_label'=> 'required|min_length[2]|max_length[255]',
            'profile_image'=> 'uploaded[profile_image]|is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'label_name'         => $this->request->getPost('label_name'),
            'primary_label_name' => $this->request->getPost('primary_label'),
        ];

        // Handle image upload
        $img = $this->request->getFile('profile_image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/label', $newName);
            $data['profile_image'] = 'uploads/label/' . $newName;
        }

        $this->labelRepo->create($data);

        return redirect()->back()->with('success', 'Label created successfully');
    }
}
