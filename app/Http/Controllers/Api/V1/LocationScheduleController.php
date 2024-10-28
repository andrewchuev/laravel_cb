<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Http\Requests\LocationScheduleRequest;
use App\Http\Resources\LocationScheduleResource;
use App\Models\LocationSchedule;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
class LocationScheduleController extends Controller
{
    #[OA\Get(
        path: "/api/v1/location-schedules",
        summary: "Retrieve list of location schedules",
        tags: ["Location Schedules"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Successful response",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(ref: "#/components/schemas/LocationScheduleResource")
                )
            )
        ]
    )]
    public function index(): JsonResponse
    {
        $schedules = LocationSchedule::with('location')->get();
        return response()->json(LocationScheduleResource::collection($schedules));
    }

    #[OA\Post(
        path: "/api/v1/location-schedules",
        summary: "Create a new location schedule",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: "#/components/schemas/LocationScheduleRequest")
        ),
        tags: ["Location Schedules"],
        responses: [
            new OA\Response(
                response: 201,
                description: "Location schedule created successfully",
                content: new OA\JsonContent(ref: "#/components/schemas/LocationScheduleResource")
            )
        ]
    )]
    public function store(LocationScheduleRequest $request): JsonResponse
    {
        $schedule = LocationSchedule::create($request->validated());
        return response()->json(new LocationScheduleResource($schedule), 201);
    }

    #[OA\Get(
        path: "/api/v1/location-schedules/{id}",
        summary: "Retrieve a specific location schedule",
        tags: ["Location Schedules"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Successful response",
                content: new OA\JsonContent(ref: "#/components/schemas/LocationScheduleResource")
            )
        ]
    )]
    public function show(LocationSchedule $schedule): JsonResponse
    {
        return response()->json(['data' => new LocationScheduleResource($schedule->load('location'))]);
    }

    #[OA\Put(
        path: "/api/v1/location-schedules/{id}",
        summary: "Update a specific location schedule",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: "#/components/schemas/LocationScheduleRequest")
        ),
        tags: ["Location Schedules"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Location schedule updated successfully",
                content: new OA\JsonContent(ref: "#/components/schemas/LocationScheduleResource")
            )
        ]
    )]
    public function update(LocationScheduleRequest $request, LocationSchedule $schedule): JsonResponse
    {
        $schedule->update($request->validated());
        return response()->json(['data' => new LocationScheduleResource($schedule)]);
    }

    #[OA\Delete(
        path: "/api/v1/location-schedules/{id}",
        summary: "Delete a specific location schedule",
        tags: ["Location Schedules"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: "Location schedule deleted successfully"
            )
        ]
    )]
    public function destroy(LocationSchedule $schedule): JsonResponse
    {
        $schedule->delete();
        return response()->json(null, 204);
    }
}
