<?php

namespace App\Repositories\Artist;

use App\Models\Backend\ArtistModel;

class ArtistRepository
{
    protected $artistModel;

    public function __construct()
    {
        $this->artistModel = new ArtistModel();
    }

    /**
     * Get paginated list of artists
     */
    public function findAll()
    {
        return $this->artistModel->findAll();
    }

    /**
     * Save new artist
     */
    public function create(array $data)
    {
        return $this->artistModel->insert($data);
    }

    /**
     * Find artist by ID
     */
    public function find($id)
    {
        return $this->artistModel->find($id);
    }

    /**
     * Update artist
     */
    public function update($id, array $data)
    {
        return $this->artistModel->update($id, $data);
    }

    /**
     * Delete artist
     */
    public function delete($id)
    {
        return $this->artistModel->delete($id);
    }
}
