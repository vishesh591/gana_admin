<?php

namespace App\Repositories\Label;

use App\Models\Backend\LabelModel;

class LabelRepository
{
    protected $labelModel;

    public function __construct()
    {
        $this->labelModel = new LabelModel();
    }

    /**
     * Get paginated list of labels
     */
    public function getPaginated($perPage = 3)
    {
        return $this->labelModel->paginate($perPage);
    }

    /**
     * Save new label
     */
    public function create(array $data)
    {
        return $this->labelModel->insert($data);
    }

    /**
     * Find label by ID
     */
    public function find($id)
    {
        return $this->labelModel->find($id);
    }

    /**
     * Update label
     */
    public function update($id, array $data)
    {
        return $this->labelModel->update($id, $data);
    }

    /**
     * Delete label
     */
    public function delete($id)
    {
        return $this->labelModel->delete($id);
    }

}