<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "BookingRequest",
    title: "Booking Request",
    description: "Booking request payload",
    required: ["booking_status", "payment_status"],
    properties: [
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
    ],
    type: "object"
)]
class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'booking_status' => 'required|integer',
            'payment_status' => 'required|integer',
            'name' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'job_reference' => 'nullable|string|max:255',
            'dangerous_goods' => 'nullable|boolean',
            'pickup_detail_id' => 'nullable|exists:pickup_details,id',
            'delivery_detail_id' => 'nullable|exists:delivery_details,id',
            'final_price' => 'nullable|numeric',
            'total_qty' => 'nullable|integer',
            'total_spaces' => 'nullable|integer',
            'total_volume' => 'nullable|integer',
            'total_weight' => 'nullable|integer'
        ];
    }
}
