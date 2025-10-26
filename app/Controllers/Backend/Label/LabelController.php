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

    public function index()
    {
        $session = session();
        $user = $session->get('user');

        if (!in_array($user['role_id'] ?? 3, [1, 2])) {
            // Non-admin users - filter by primary_label_name
            $userPrimaryLabel = $user['primary_label_name'] ?? null;

            if ($userPrimaryLabel) {
                $labelModel = new \App\Models\Backend\LabelModel();
                $data['labels'] = $labelModel
                    ->where('primary_label_name', $userPrimaryLabel)
                    ->findAll();
            } else {
                $data['labels'] = [];
            }
        } else {
            // Admin users - get all data
            $data['labels'] = $this->labelRepo->findAll();
        }

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

    public function store()
    {
        $validationRules = [
            'label_name'   => 'required|min_length[2]|max_length[255]',
            'logo'         => 'uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
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

        $labelName = $this->request->getPost('label_name');
        $primaryLabelName = $this->request->getPost('primary_label_name');

        // Check if label with same name and primary_label_name already exists
        $labelModel = new \App\Models\Backend\LabelModel();
        $existingLabel = $labelModel
            ->where('label_name', $labelName)
            ->where('primary_label_name', $primaryLabelName)
            ->first();

        if ($existingLabel) {
            $error = "Label '{$labelName}' already exists under primary label '{$primaryLabelName}'. Please use a different label name or primary label.";

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors' => ['duplicate' => $error]
                ]);
            }

            return redirect()->back()->withInput()->with('error', $error);
        }

        $session = session();
        $user    = $session->get('user');

        $userModel = new \App\Models\UserModel();
        $userRow   = $userModel->where('primary_label_name', $primaryLabelName)->first();

        // Set status based on user role
        $isAdmin = in_array($user['role_id'] ?? 3, [1, 2]);
        $status = $isAdmin ? 2 : 1; // Admin: Approved, Non-admin: In Review

        $data = [
            'label_name'         => $labelName,
            'primary_label_name' => $primaryLabelName,
            'user_id'            => $userRow ? $userRow['id'] : null,
            'status'             => $status,
            'created_by'         => $user['id']
        ];

        // Handle image upload
        $img = $this->request->getFile('logo');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/label', $newName);
            $data['logo'] = 'uploads/label/' . $newName;
        }

        $this->labelRepo->create($data);

        $message = $isAdmin ? 'Label created successfully' : 'Label request submitted successfully and is under review';

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => $message
            ]);
        }

        return redirect()->back()->with('success', $message);
    }


    public function getLabelsJson()
    {
        $session = session();
        $user = $session->get('user');
        $isAdmin = in_array($user['role_id'] ?? 3, [1, 2]);

        if ($isAdmin) {
            $labels = $this->labelRepo->findAll();
        } else {
            $userPrimaryLabel = $user['primary_label_name'] ?? null;

            if ($userPrimaryLabel) {
                $labelModel = new \App\Models\Backend\LabelModel();
                $labels = $labelModel
                    ->where('primary_label_name', $userPrimaryLabel)
                    ->findAll();
            } else {
                $labels = [];
            }
        }

        $releaseModel = new \App\Models\Backend\ReleaseModel();

        $data = [];
        foreach ($labels as $label) {
            $statusText = $this->getStatusText($label['status'] ?? 1);
            $statusClass = $this->getStatusClass($label['status'] ?? 1);

            $releaseCount = $releaseModel->where('label_id', $label['id'])->countAllResults();

            $row = [
                'id'            => $label['id'],
                'name'          => $label['label_name'] . ' (' . $label['primary_label_name'] . ')',
                'logo'          => !empty($label['logo']) ? base_url($label['logo']) : base_url('images/default.png'),
                'release_count' => $releaseCount, // Use actual count from ReleaseModel
                'status'        => $label['status'] ?? 1,
                'status_text'   => $statusText,
                'status_class'  => $statusClass,
                'actions'       => '' // Always include, even if empty
            ];

            if ($isAdmin) {
                $row['actions'] = $this->generateActionButtons($label['id'], $label['status'] ?? 1);
            }

            $data[] = $row;
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }



    public function updateStatus()
    {
        $session = session();
        $user = $session->get('user');

        // Only admin users can update status
        if (!in_array($user['role_id'] ?? 3, [1, 2])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unauthorized access'
            ]);
        }

        $labelId = $this->request->getPost('label_id');
        $status = $this->request->getPost('status');

        if (!$labelId || !in_array($status, [1, 2, 3])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid parameters'
            ]);
        }

        $updateData = [
            'status' => $status,
            'updated_by' => $user['id'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $updated = $this->labelRepo->update($labelId, $updateData);

        if ($updated) {
            $statusText = $this->getStatusText($status);
            return $this->response->setJSON([
                'success' => true,
                'message' => "Label status updated to {$statusText} successfully"
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update status'
        ]);
    }

    private function getStatusText($status)
    {
        switch ($status) {
            case 1:
                return 'In Review';
            case 2:
                return 'Approved';
            case 3:
                return 'Rejected';
            default:
                return 'Unknown';
        }
    }

    private function getStatusClass($status)
    {
        switch ($status) {
            case 1:
                return 'warning';
            case 2:
                return 'success';
            case 3:
                return 'danger';
            default:
                return 'secondary';
        }
    }

    private function generateActionButtons($labelId, $status)
    {
        $buttons = '';

        if ($status == 1) { // In Review
            $buttons .= '<button class="btn btn-sm btn-success me-1" onclick="updateLabelStatus(' . $labelId . ', 2)" title="Approve">
                            <i data-feather="check" class="feather-sm"></i>
                        </button>';
            $buttons .= '<button class="btn btn-sm btn-danger" onclick="updateLabelStatus(' . $labelId . ', 3)" title="Reject">
                            <i data-feather="x" class="feather-sm"></i>
                        </button>';
        } elseif ($status == 2) { // Approved
            $buttons .= '<button class="btn btn-sm btn-warning me-1" onclick="updateLabelStatus(' . $labelId . ', 1)" title="Move to Review">
                            <i data-feather="clock" class="feather-sm"></i>
                        </button>';
            $buttons .= '<button class="btn btn-sm btn-danger" onclick="updateLabelStatus(' . $labelId . ', 3)" title="Reject">
                            <i data-feather="x" class="feather-sm"></i>
                        </button>';
        } else { // Rejected
            $buttons .= '<button class="btn btn-sm btn-success me-1" onclick="updateLabelStatus(' . $labelId . ', 2)" title="Approve">
                            <i data-feather="check" class="feather-sm"></i>
                        </button>';
            $buttons .= '<button class="btn btn-sm btn-warning" onclick="updateLabelStatus(' . $labelId . ', 1)" title="Move to Review">
                            <i data-feather="clock" class="feather-sm"></i>
                        </button>';
        }

        return $buttons;
    }
}
