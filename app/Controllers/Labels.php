<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\LabelsModel;

class Labels extends BaseController
{
    public function index()
    {
        return view('labels');
    }

    public function add_lable()
    {
        /**
         * Create user as lable
         */
        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            $userModel = new UsersModel();

            $data = [
                'name'     => $this->request->getPost('label_name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role_type'  => "Label",  // e.g. 2 for sub admin, 3 for end user
                'status'   => 1
            ];

            $userId = $userModel->insert($data);

            echo "<pre>";
            print_r($userId);
            die;

            if (!empty($userId)) {
                $labelsModel = new LabelsModel();

                $labelData = [
                    'user_id' => $userId,
                    'label_name' => $this->request->getPost('label_name'),
                    'primary_label' => $this->request->getPost('primary_label'),
                ];

                $labelId = $labelsModel->insert($labelData);

                if (!empty($labelId)) {
                    $this->uploadProfile($labelId);
                    return redirect()->to('/labels')->with('message', 'Lable created successfully!');
                }
            }
        }
        return redirect()->to('/labels')->with('message', 'Lable creation has been failed!');
    }

    public function uploadProfile($labelId)
    {
        $labelsModel = new LabelsModel();

        $file = $this->request->getFile('profile_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Custom path - full absolute path
            $targetPath = WRITEPATH . 'uploads/images/users';  // Adjusted for CodeIgniter context
            $newName = $file->getRandomName(); // Or use $file->getClientName()

            $file->move($targetPath, $newName);

            $labelsModel->update($labelId, ['profile_image' => $newName]);

            return true;
        }

        return false;
    }
}
