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
        unset($validated['role']); // remove role name, only save role_id

        // Handle file upload
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $validated['profile_picture'] = $file->store('uploads');
        } else {
            $validated['profile_picture'] = null;
        }

        // Hash password
        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

        // Insert
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

    public function index(){

        $user = $this->userModel->findAll();

        // return response()->setJson($user);
        $page_array = [
            'file_name' => 'profile_page',
            'users' => $user
        ];

        return view('superadmin/index', $page_array);

    }
}
