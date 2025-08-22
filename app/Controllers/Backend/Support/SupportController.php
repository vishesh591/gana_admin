<?php

namespace App\Controllers\Backend\Support;

use App\Controllers\BaseController;
use App\Repositories\Support\SupportRequestRepository;

class SupportController extends BaseController
{
    protected $supportRepo;

    public function __construct()
    {
        $this->supportRepo = new SupportRequestRepository();
    }

    public function index()
    {
        // $data['support'] = $this->supportRepo->findAll();

        $page_array = [
            'file_name' => 'support',
        ];
        return view('superadmin/index', $page_array);
    }

    public function data()
    {
        $requests = $this->supportRepo->getAll();

        $data = [];
        foreach ($requests as $req) {
            $statusBadge = '';
            if ($req['status'] === 'resolved') {
                $statusBadge = '<span class="badge bg-success">Resolved</span>';
            } elseif ($req['status'] === 'in_review') {
                $statusBadge = '<span class="badge bg-info">In Review</span>';
            } else {
                $statusBadge = '<span class="badge bg-warning">Pending</span>';
            }

            $data[] = [
                'id'         => '#' . $req['id'],
                'full_name'  => $req['full_name'],
                'email'      => $req['email'],
                'subject'    => $req['subject'],
                'status'     => $statusBadge,
                'created_at' => $req['created_at']
                    ? date('Y-m-d', strtotime($req['created_at']))
                    : '',
                'actions' => '<button 
                class="btn btn-sm btn-primary rounded-pill px-3 viewSupportBtn" 
                data-id="' . $req['id'] . '" 
                data-message="' . htmlspecialchars($req['message']) . '" 
                data-status="' . $req['status'] . '">View</button>'
            ];
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }

    public function store()
    {
        $validationRules = [
            'full_name'  => 'required|min_length[2]',
            'email'     => 'required|valid_email',
            'subject'   => 'required|min_length[2]',
            'message'   => 'required|min_length[5]',
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
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'subject'   => $this->request->getPost('subject'),
            'message'   => $this->request->getPost('message'),
        ];

        $this->supportRepo->create($data);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Your support request has been submitted!'
            ]);
        }

        return redirect()->back()->with('success', 'Your support request has been submitted!');
    }


    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $validStatuses = ['pending', 'in_review', 'resolved'];

        if (!in_array($status, $validStatuses)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid status value'
            ]);
        }
        // Example: update via model/repo
        $this->supportRepo->updateStatus($id, $status);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Status updated successfully'
        ]);
    }
}
