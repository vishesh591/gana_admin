<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Exceptions\DataException;

class RegisterController extends BaseController
{
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function register()
    {
        $validationRules = [
            'name'                 => 'required|min_length[3]',
            'email'                => 'required|valid_email|is_unique[g_users.email]',
            'password'             => 'required|min_length[6]',
            'profile_picture'      => 'if_exist|uploaded[profile_picture]|max_size[profile_picture,2048]|is_image[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png]',
            'agreement_file'       => 'if_exist|uploaded[agreement_file]|max_size[agreement_file,5120]|mime_in[agreement_file,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpg,image/jpeg,image/png]',
            'company_name'         => 'required|min_length[3]',
            'primary_label_name'   => 'required|min_length[3]',
            'phone'                => 'required|regex_match[/^\+?[0-9]{10,15}$/]',
            'role'                 => 'required|in_list[artist,label,distributor,subadmin,superadmin]',
            'user_name'            => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'account_number'       => 'required|is_unique[g_users.account_number]|numeric',
            'ifsc_code'            => 'required|regex_match[/^[A-Z]{4}0[A-Z0-9]{6}$/]',
            'holder_name'          => 'required|min_length[3]|max_length[50]',
            'branch_name'          => 'required|min_length[3]|max_length[50]',
            'agreement_start_date' => 'required|valid_date',
            'agreement_end_date'   => 'required|valid_date',
        ];

        if (! $this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $validated = $this->validator->getValidated();

        // Convert role name to role_id
        $role = $this->db->table('g_roles')
            ->where('role_name', $validated['role'])
            ->get()
            ->getRow();

        if (! $role) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid role selected.'
            ]);
        }

        $validated['role_id'] = $role->id;
        unset($validated['role']);

        // --- Profile Picture Upload ---
        $profileFile = $this->request->getFile('profile_picture');
        if ($profileFile && $profileFile->isValid() && ! $profileFile->hasMoved()) {
            $newName = $profileFile->getRandomName();
            $profileFile->move(FCPATH . 'uploads/profile_pictures', $newName);
            $validated['profile_picture'] = 'uploads/profile_pictures/' . $newName;
        } else {
            $validated['profile_picture'] = null;
        }

        // --- Agreement File Upload ---
        $agreementFile = $this->request->getFile('agreement_file');
        if ($agreementFile && $agreementFile->isValid() && ! $agreementFile->hasMoved()) {
            $newName = $agreementFile->getRandomName();
            $agreementFile->move(FCPATH . 'uploads/agreements', $newName);
            $validated['agreement_document'] = 'uploads/agreements/' . $newName;
        } else {
            $validated['agreement_document'] = null;
        }

        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

        $this->userModel->insert($validated);

        return redirect()->back()->with('success', 'User registered successfully');
    }


    public function accounts()
    {
        $users = $this->userModel->findAll();
        $currentDate = date('Y-m-d');
        foreach ($users as &$user) {
            if (
                !empty($user['agreement_start_date']) &&
                !empty($user['agreement_end_date']) &&
                $user['agreement_start_date'] <= $currentDate &&
                $user['agreement_end_date'] >= $currentDate
            ) {
                $user['status'] = 'Active';
            } else {
                $user['status'] = 'Inactive';
            }
        }
        $page_array = [
            'file_name' => 'user_list',
            'users' => $users
        ];

        return view('superadmin/index', $page_array);
    }

    public function getAccountsJson()
    {
        $users = $this->userModel->findAll();
        $currentDate = date('Y-m-d');

        foreach ($users as &$user) {
            if (
                !empty($user['agreement_start_date']) &&
                !empty($user['agreement_end_date']) &&
                $user['agreement_start_date'] <= $currentDate &&
                $user['agreement_end_date'] >= $currentDate
            ) {
                $user['status'] = 'Active';
            } else {
                $user['status'] = 'Inactive';
            }
        }

        return $this->response->setJSON([
            "data" => $users
        ]);
    }

    public function index()
    {
        $userId = session()->get('user')['email'];
        $user   = $this->userModel->getUserWithRoleByEmail($userId);
        // return response()->setJSON($user);
        $page_array = [
            'file_name' => 'profile_page',
            'user' => $user
        ];

        return view('superadmin/index', $page_array);
    }

    public function editUser($userId)
    {
        $user = $this->userModel->getUserWithRoleById($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $page_array = [
            'file_name' => 'profile_page',
            'user' => $user
        ];

        return view('superadmin/index', $page_array);
    }

    public function updateUserProfile()
    {
        try {
            $userId = $this->request->getPost('user_id');

            if (!$userId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'User ID is required'
                ]);
            }

            $updateData = [
                'name' => $this->request->getPost('name'),
                'company_name' => $this->request->getPost('company_name'),
                'primary_label_name' => $this->request->getPost('primary_label_name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'holder_name' => $this->request->getPost('holder_name'),
                'account_number' => $this->request->getPost('account_number'),
                'ifsc_code' => $this->request->getPost('ifsc_code'),
                'branch_name' => $this->request->getPost('branch_name'),
                'agreement_start_date' => $this->request->getPost('agreement_start_date'),
                'agreement_end_date' => $this->request->getPost('agreement_end_date')
            ];

            $result = $this->userModel->update($userId, $updateData);

            if ($result) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Profile updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to update profile'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    public function resetUserPassword()
    {
        try {
            $input = $this->request->getJSON(true);

            $userId = $input['user_id'] ?? null;
            $newPassword = $input['new_password'] ?? null;
            $confirmPassword = $input['confirm_password'] ?? null;

            if (!$userId || !$newPassword || !$confirmPassword) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'All fields are required'
                ]);
            }

            if ($newPassword !== $confirmPassword) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Passwords do not match'
                ]);
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $result = $this->userModel->update($userId, ['password' => $hashedPassword]);

            if ($result) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Password reset successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to reset password'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
