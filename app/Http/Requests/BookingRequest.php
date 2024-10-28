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
        new OA\Property(property: "pickup_detail", description: "Pickup detail", type: "object"),
        new OA\Property(property: "delivery_detail", description: "Delivery detail", type: "object"),
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
            'final_price' => 'nullable|numeric',
            'total_qty' => 'nullable|integer',
            'total_spaces' => 'nullable|integer',
            'total_volume' => 'nullable|integer',
            'total_weight' => 'nullable|integer',

            'pickup_details' => 'nullable|array',
            'pickup_details.pickup_type' => 'required|integer',
            'pickup_details.pickup_time_type' => 'required|integer',
            'pickup_details.location_id' => 'nullable|exists:locations,id',
            'pickup_details.address' => 'nullable|string|max:255',
            'pickup_details.lng' => 'nullable|string|max:255',
            'pickup_details.lat' => 'nullable|string|max:255',
            'pickup_details.date' => 'nullable|date',
            'pickup_details.timeslot_from' => 'nullable|date_format:H:i:s',
            'pickup_details.timeslot_to' => 'nullable|date_format:H:i:s',
            'pickup_details.contact_name' => 'nullable|string|max:255',
            'pickup_details.contact_phone' => 'nullable|string|max:255',
            'pickup_details.contact_email' => 'nullable|email|max:255',
            'pickup_details.company_name' => 'nullable|string|max:255',
            'pickup_details.company_email' => 'nullable|email|max:255',
            'pickup_details.special_instructions' => 'nullable|string|max:255',

            'delivery_details' => 'nullable|array',
            'delivery_details.delivery_type' => 'required|integer',
            'delivery_details.delivery_time_type' => 'required|integer',
            'delivery_details.location_id' => 'nullable|exists:locations,id',
            'delivery_details.address' => 'nullable|string|max:255',
            'delivery_details.lng' => 'nullable|string|max:255',
            'delivery_details.lat' => 'nullable|string|max:255',
            'delivery_details.date' => 'nullable|date',
            'delivery_details.timeslot_from' => 'nullable|date_format:H:i:s',
            'delivery_details.timeslot_to' => 'nullable|date_format:H:i:s',
            'delivery_details.contact_name' => 'nullable|string|max:255',
            'delivery_details.contact_phone' => 'nullable|string|max:255',
            'delivery_details.contact_email' => 'nullable|email|max:255',
            'delivery_details.company_name' => 'nullable|string|max:255',
            'delivery_details.company_email' => 'nullable|email|max:255',
            'delivery_details.special_instructions' => 'nullable|string|max:255'
        ];
    }
}
