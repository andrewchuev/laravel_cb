<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LocationResource",
    properties: [
        new OA\Property(property: "id", description: "ID of the location", type: "integer"),
        new OA\Property(property: "title", description: "Title of the location", type: "string"),
        new OA\Property(property: "lng", description: "Longitude of the location", type: "number", format: "double", nullable: true),
        new OA\Property(property: "lat", description: "Latitude of the location", type: "number", format: "double", nullable: true),
        new OA\Property(property: "address", description: "Address of the location", type: "string", nullable: true),
        new OA\Property(property: "city", description: "City of the location", type: "string", nullable: true),
        new OA\Property(property: "postcode", description: "Postcode of the location", type: "string", nullable: true),
        new OA\Property(property: "created_at", description: "Creation timestamp", type: "string", format: "date-time"),
        new OA\Property(property: "updated_at", description: "Last update timestamp", type: "string", format: "date-time"),
        new OA\Property(property: "schedules", description: "List of schedules for the location", type: "array", items: new OA\Items(ref: "#/components/schemas/LocationScheduleResource")),
    ],
    type: "object"
)]
class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'address' => $this->address,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'schedules' => LocationScheduleResource::collection($this->whenLoaded('schedules')),
        ];
    }
}
