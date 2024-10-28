<?php

namespace App\Repositories;

use App\Models\DeliveryDetail;
class DeliveryDetailRepository
{
    protected $model;

    public function __construct(DeliveryDetail $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $deliveryDetail = $this->model->findOrFail($id);
        $deliveryDetail->update($data);
        return $deliveryDetail;
    }
}
