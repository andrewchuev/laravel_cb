<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LocationScheduleResource",
    properties: [
        new OA\Property(property: "id", description: "ID of the schedule", type: "integer"),
        new OA\Property(property: "location_id", description: "ID of the location", type: "integer"),
        new OA\Property(property: "day_number", description: "Day number (0-6)", type: "integer"),
        new OA\Property(property: "from", description: "Opening time", type: "string", format: "time", nullable: true),
        new OA\Property(property: "to", description: "Closing time", type: "string", format: "time", nullable: true),
        new OA\Property(property: "created_at", description: "Creation timestamp", type: "string", format: "date-time"),
        new OA\Property(property: "updated_at", description: "Last update timestamp", type: "string", format: "date-time"),
        new OA\Property(property: "location", ref: "#/components/schemas/LocationResource", description: "The location associated with the schedule"),
    ],
    type: "object"
)]
class LocationScheduleResource extends JsonResource
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
            'location_id' => $this->location_id,
            'day_number' => $this->day_number,
            'from' => $this->from,
            'to' => $this->to,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'location' => new LocationResource($this->whenLoaded('location')),
        ];
    }
}
