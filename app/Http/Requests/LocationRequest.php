<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;
#[OA\Schema(
    schema: "LocationRequest",
    required: ["title"],
    properties: [
        new OA\Property(property: "title", description: "Title of the location", type: "string", maxLength: 255),
        new OA\Property(property: "lng", description: "Longitude of the location", type: "number", format: "double", nullable: true),
        new OA\Property(property: "lat", description: "Latitude of the location", type: "number", format: "double", nullable: true),
        new OA\Property(property: "address", description: "Address of the location", type: "string", maxLength: 255, nullable: true),
        new OA\Property(property: "city", description: "City of the location", type: "string", maxLength: 255, nullable: true),
        new OA\Property(property: "postcode", description: "Postcode of the location", type: "string", maxLength: 255, nullable: true),
    ],
    type: "object"
)]
class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'lng' => 'nullable|numeric',
            'lat' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:255',
        ];
    }
}
