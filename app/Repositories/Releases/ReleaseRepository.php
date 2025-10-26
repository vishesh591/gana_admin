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

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getLabelName()
    {
        return $this->model
            ->select('g_release.*, g_labels.label_name, g_labels.primary_label_name')
            ->join('g_labels', 'g_labels.id = g_release.label_id')
            ->findAll();
    }

    public function update($id, $data)
    {
        return $this->model->update($id, $data);
    }

    public function countAllData($userId = null)
    {
        $query = $this->model->select("
        COUNT(*) as total,
        SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) as delivered,
        SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as in_review,
        SUM(CASE WHEN status = 4 THEN 1 ELSE 0 END) as rejected,
        SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as takedown,
        SUM(CASE WHEN status = 5 THEN 1 ELSE 0 END) as approved
    ");

        // If userId is provided, filter by created_by
        if ($userId) {
            $query->where('created_by', $userId);
        }

        return $query->first();
    }

    /**
     * Get total revenue from sale_price
     */
    public function getTotalRevenue($userId = null)
    {
        $query = $this->model
            ->select("SUM(CAST(sale_price AS DECIMAL(10,2))) as total_revenue")
            ->where('sale_price IS NOT NULL')
            ->where('sale_price !=', '');

        // If userId is provided, filter by created_by
        if ($userId) {
            $query->where('created_by', $userId);
        }

        return $query->first();
    }

    public function getDraftCount($userId = null)
    {
        $draftModel = new \App\Models\Backend\ReleaseDraftModel();
        
        $query = $draftModel->selectCount('id', 'draft_count');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        $result = $query->first();
        return $result['draft_count'] ?? 0;
    }

    public function findAllByUser($userId)
    {
        return $this->model
            ->where('created_by', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function findAllByLabelIds(array $labelIds)
    {
        if (empty($labelIds)) {
            return [];
        }

        return $this->model
            ->whereIn('label_id', $labelIds)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}
