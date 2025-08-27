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

    public function findAll()
    {
        return $this->model->findAll();
    }

    public function findWithRelations(int $id)
    {
        return $this->model
            ->select('g_release.*, g_labels.name as label_name')
            ->join('g_labels', 'g_labels.id = g_release.label_id', 'left')
            ->where('g_release.id', $id)
            ->first();
    }

    public function find($id){
        return $this->model->find($id);
    }
}
