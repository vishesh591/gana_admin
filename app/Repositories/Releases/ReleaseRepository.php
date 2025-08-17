<?php

namespace App\Repositories\Releases;

use App\Models\Backend\ReleaseModel;

class ReleaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ReleaseModel();
    }

    public function paginate($perPage = 10, $group = 'default', $page = 1)
    {
        return $this->model->paginate($perPage, $group, $page);
    }

    public function create(array $data)
    {
        return $this->model->insert($data);
    }

    public function getPager()
    {
        return $this->model->pager;
    }
}
