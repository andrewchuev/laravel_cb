<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class LocationController extends Controller
{
    #[OA\Get(
        path: "/api/v1/locations",
        summary: "Retrieve list of locations",
        tags: ["Locations"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Successful response",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(ref: "#/components/schemas/LocationResource")
                )
            )
        ]
    )]
    public function index(): JsonResponse
    {
        $locations = Location::with('schedules')->get();
        return response()->json(LocationResource::collection($locations));
    }



    #[OA\Get(
        path: "/api/v1/locations/{id}",
        summary: "Retrieve a specific location",
        tags: ["Locations"],
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
                content: new OA\JsonContent(ref: "#/components/schemas/LocationResource")
            )
        ]
    )]
    public function show(Location $location): JsonResponse
    {
        return response()->json(new LocationResource($location->load('schedules')));
    }


    #[OA\Post(
        path: "/api/v1/locations",
        summary: "Create a new location",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: "#/components/schemas/LocationRequest")
        ),
        tags: ["Locations"],
        responses: [
            new OA\Response(
                response: 201,
                description: "Location created successfully",
                content: new OA\JsonContent(ref: "#/components/schemas/LocationResource")
            )
        ]
    )]
    public function store(LocationRequest $request): JsonResponse
    {
        $location = Location::create($request->validated());
        return response()->json(new LocationResource($location), 201);
    }
    #[OA\Put(
        path: "/api/v1/locations/{id}",
        summary: "Update a specific location",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: "#/components/schemas/LocationRequest")
        ),
        tags: ["Locations"],
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
                description: "Location updated successfully",
                content: new OA\JsonContent(ref: "#/components/schemas/LocationResource")
            )
        ]
    )]
    public function update(LocationRequest $request, Location $location): JsonResponse
    {
        $location->update($request->validated());
        return response()->json(['data' => new LocationResource($location)]);
    }

    #[OA\Delete(
        path: "/api/v1/locations/{id}",
        summary: "Delete a specific location",
        tags: ["Locations"],
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
                description: "Location deleted successfully"
            )
        ]
    )]
    public function destroy(Location $location): JsonResponse
    {
        $location->delete();
        return response()->json(null, 204);
    }
}
