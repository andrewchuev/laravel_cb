<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'booking_status' => $this->booking_status,
            'payment_status' => $this->payment_status,
            'name' => $this->name,
            'company' => $this->company,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'job_reference' => $this->job_reference,
            'dangerous_goods' => $this->dangerous_goods,
            'pickup_detail_id' => $this->pickup_detail_id,
            'delivery_detail_id' => $this->delivery_detail_id,
            'final_price' => $this->final_price,
            'total_qty' => $this->total_qty,
            'total_spaces' => $this->total_spaces,
            'total_volume' => $this->total_volume,
            'total_weight' => $this->total_weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

