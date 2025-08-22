<?php

namespace App\Repositories\Support;

use App\Models\Backend\SupportRequestModel;

class SupportRequestRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new SupportRequestModel();
    }

    public function create(array $data)
    {
        return $this->model->insert($data);
    }

    public function getAll()
    {
        return $this->model->orderBy('created_at', 'DESC')->findAll();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function updateStatus($id, $status)
    {
        return $this->model->update($id, ['status' => $status]);
    }
}
