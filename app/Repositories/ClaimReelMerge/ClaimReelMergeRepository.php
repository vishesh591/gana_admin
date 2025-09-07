<?php

namespace App\Repositories\ClaimReelMerge;

use App\Models\Backend\ClaimReelMergeModel;

class ClaimReelMergeRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ClaimReelMergeModel();
    }

    public function create(array $data)
    {
        return $this->model->insert($data);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->findAll();
    }
}
