<?php

namespace App\Repositories\ClaimingRequest;

use App\Models\Backend\ClaimingRequestModel;

class ClaimingRequestRepository
{
    protected $claimingRequestModel;

    public function __construct()
    {
        $this->claimingRequestModel = new ClaimingRequestModel();
    }

    /**
     * Get all claiming requests
     */
    public function findAll()
    {
        return $this->claimingRequestModel->findAll();
    }

    /**
     * Get claiming requests with filters
     */
    public function getAll($filters = [])
    {
        $builder = $this->claimingRequestModel->builder();

        if (isset($filters['status']) && $filters['status'] !== 'all') {
            $builder->where('status', $filters['status']);
        }

        if (isset($filters['search']) && !empty($filters['search'])) {
            $builder->groupStart()
                    ->like('song_name', $filters['search'])
                    ->orLike('artist_name', $filters['search'])
                    ->orLike('isrc', $filters['search'])
                    ->groupEnd();
        }

        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $builder->where('created_at >=', $filters['date_from']);
        }

        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $builder->where('created_at <=', $filters['date_to']);
        }

        return $builder->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Create new claiming request
     */
    public function create(array $data)
    {
        return $this->claimingRequestModel->insert($data);
    }

    /**
     * Find claiming request by ID
     */
    public function find($id)
    {
        return $this->claimingRequestModel->find($id);
    }

    /**
     * Update claiming request
     */
    public function update($id, array $data)
    {
        return $this->claimingRequestModel->update($id, $data);
    }

    /**
     * Delete claiming request
     */
    public function delete($id)
    {
        return $this->claimingRequestModel->delete($id);
    }

    /**
     * Update status only
     */
    public function updateStatus($id, $status)
    {
        return $this->claimingRequestModel->update($id, ['status' => $status]);
    }

    /**
     * Get data for DataTables
     */
    public function getDataTableData($params)
    {
        return $this->claimingRequestModel->getDataTableData($params);
    }

    /**
     * Get status statistics
     */
    public function getStatusStats()
    {
        return $this->claimingRequestModel->getStatusStats();
    }

    /**
     * Get recent requests
     */
    public function getRecentRequests($limit = 10)
    {
        return $this->claimingRequestModel->getRecentRequests($limit);
    }

    /**
     * Export data to CSV format
     */
    public function getForExport($filters = [])
    {
        $requests = $this->getAll($filters);
        
        $exportData = [];
        foreach ($requests as $request) {
            $exportData[] = [
                'ID' => $request['id'],
                'Song Name' => $request['song_name'],
                'Artist Name' => $request['artist_name'],
                'UPC' => $request['upc'] ?? 'N/A',
                'ISRC' => $request['isrc'] ?? 'N/A',
                'Video Links' => $request['video_links'] ?? '',
                'Removal Reason' => $request['removal_reason'] ?? '',
                'Instagram' => $request['instagram_link'] ?? '',
                'Facebook' => $request['facebook_link'] ?? '',
                'Status' => $request['status'],
                'Created At' => $request['created_at']
            ];
        }

        return $exportData;
    }

    /**
     * Get by ISRC code
     */
    public function getByIsrc($isrc)
    {
        return $this->claimingRequestModel->where('isrc', $isrc)->findAll();
    }

    /**
     * Get by artist name
     */
    public function getByArtist($artistName)
    {
        return $this->claimingRequestModel->like('artist_name', $artistName)->findAll();
    }

    /**
     * Get pending requests count
     */
    public function getPendingCount()
    {
        return $this->claimingRequestModel->where('status', 'Pending')->countAllResults();
    }

    /**
     * Bulk update status
     */
    public function bulkUpdateStatus($ids, $status)
    {
        return $this->claimingRequestModel->whereIn('id', $ids)->set(['status' => $status])->update();
    }
}