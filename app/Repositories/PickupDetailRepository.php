<?php

namespace App\Repositories;

use App\Models\PickupDetail;

class PickupDetailRepository
{
    protected $model;

    public function __construct(PickupDetail $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $pickupDetail = $this->model->findOrFail($id);
        $pickupDetail->update($data);
        return $pickupDetail;
    }
}
