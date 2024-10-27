<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="BookingRequest",
 *     type="object",
 *     title="Booking Request",
 *     description="Booking request payload",
 *     required={"booking_status", "payment_status"},
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
 *     @OA\Property(property="total_weight", type="integer", description="Total weight of the booking")
 * )
 */
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
