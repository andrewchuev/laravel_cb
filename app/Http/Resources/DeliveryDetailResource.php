<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'delivery_type' => $this->delivery_type,
            'delivery_time_type' => $this->delivery_time_type,
            'location_id' => $this->location_id,
            'address' => $this->address,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'date' => $this->date,
            'timeslot_from' => $this->timeslot_from,
            'timeslot_to' => $this->timeslot_to,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'company_name' => $this->company_name,
            'company_email' => $this->company_email,
            'special_instructions' => $this->special_instructions,
        ];
    }
}
