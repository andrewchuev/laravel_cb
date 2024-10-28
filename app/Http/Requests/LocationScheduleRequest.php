<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;
#[OA\Schema(
    schema: "LocationScheduleRequest",
    required: ["location_id", "day_number"],
    properties: [
        new OA\Property(property: "location_id", description: "ID of the location", type: "integer"),
        new OA\Property(property: "day_number", description: "Day number (0-6)", type: "integer", maximum: 6, minimum: 0),
        new OA\Property(property: "from", description: "Opening time", type: "string", format: "time", nullable: true),
        new OA\Property(property: "to", description: "Closing time", type: "string", format: "time", nullable: true),
    ],
    type: "object"
)]
class LocationScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'location_id' => 'required|exists:locations,id',
            'day_number' => 'required|integer|min:0|max:6',
            'from' => 'nullable|date_format:H:i',
            'to' => 'nullable|date_format:H:i',
        ];
    }
}
