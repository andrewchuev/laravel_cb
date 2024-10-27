<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="BookingResource",
 *     type="object",
 *     title="Booking Resource",
 *     description="Booking resource representation",
 *     @OA\Property(property="id", type="integer", description="ID of the booking"),
 *     @OA\Property(property="booking_status", type="integer", description="Status of the booking"),
 *     @OA\Property(property="payment_status", type="integer", description="Payment status of the booking"),
 *     @OA\Property(property="name", type="string", description="Name of the customer"),
 *     @OA\Property(property="company", type="string", description="Company of the customer"),
 *     @OA\Property(property="email", type="string", description="Email of the customer"),
 *     @OA\Property(property="phone_number", type="string", description="Phone number of the customer"),
 *     @OA\Property(property="job_reference", type="string", description="Job reference for the booking"),
 *     @OA\Property(property="dangerous_goods", type="boolean", description="Whether the booking involves dangerous goods"),
 *     @OA\Property(property="pickup_detail_id", type="integer", description="Pickup detail ID"),
 *     @OA\Property(property="delivery_detail_id", type="integer", description="Delivery detail ID"),
 *     @OA\Property(property="final_price", type="number", format="float", description="Final price of the booking"),
 *     @OA\Property(property="total_qty", type="integer", description="Total quantity of items"),
 *     @OA\Property(property="total_spaces", type="integer", description="Total number of spaces"),
 *     @OA\Property(property="total_volume", type="integer", description="Total volume of the booking"),
 *     @OA\Property(property="total_weight", type="integer", description="Total weight of the booking"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */
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

