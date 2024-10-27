<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
