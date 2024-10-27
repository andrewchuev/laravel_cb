<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "BookingResource",
    title: "Booking Resource",
    description: "Booking resource representation",
    properties: [
        new OA\Property(property: "id", description: "ID of the booking", type: "integer"),
        new OA\Property(property: "booking_status", description: "Status of the booking", type: "integer"),
        new OA\Property(property: "payment_status", description: "Payment status of the booking", type: "integer"),
        new OA\Property(property: "name", description: "Name of the customer", type: "string"),
        new OA\Property(property: "company", description: "Company of the customer", type: "string"),
        new OA\Property(property: "email", description: "Email of the customer", type: "string"),
        new OA\Property(property: "phone_number", description: "Phone number of the customer", type: "string"),
        new OA\Property(property: "job_reference", description: "Job reference for the booking", type: "string"),
        new OA\Property(property: "dangerous_goods", description: "Whether the booking involves dangerous goods", type: "boolean"),
        new OA\Property(property: "pickup_detail_id", description: "Pickup detail ID", type: "integer"),
        new OA\Property(property: "delivery_detail_id", description: "Delivery detail ID", type: "integer"),
        new OA\Property(property: "final_price", description: "Final price of the booking", type: "number", format: "float"),
        new OA\Property(property: "total_qty", description: "Total quantity of items", type: "integer"),
        new OA\Property(property: "total_spaces", description: "Total number of spaces", type: "integer"),
        new OA\Property(property: "total_volume", description: "Total volume of the booking", type: "integer"),
        new OA\Property(property: "total_weight", description: "Total weight of the booking", type: "integer"),
        new OA\Property(property: "created_at", description: "Creation timestamp", type: "string", format: "date-time"),
        new OA\Property(property: "updated_at", description: "Last update timestamp", type: "string", format: "date-time"),
    ],
    type: "object"
)]
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

