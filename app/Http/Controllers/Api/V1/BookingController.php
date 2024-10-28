<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Exception;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    description: "API documentation for ChillBooking service",
    title: "ChillBooking API"
)
]
class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    #[OA\Get(
        path: '/api/v1/bookings/{id}',
        summary: 'Get booking by ID',
        tags: ['Bookings'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'Booking ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful operation',
                content: new OA\JsonContent(ref: '#/components/schemas/BookingResource')
            ),
            new OA\Response(
                response: 404,
                description: 'Booking not found'
            )
        ]
    )]
    public function show($id): JsonResponse
    {
        try {
            $booking = $this->bookingService->getBookingById($id);
            return response()->json(new BookingResource($booking));
        } catch (Exception $e) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }

    #[OA\Post(
        path: '/api/v1/bookings',
        summary: 'Create a new booking',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/BookingRequest')
        ),
        tags: ['Bookings'],
        responses: [
            new OA\Response(
                response: 201,
                description: 'Booking created successfully',
                content: new OA\JsonContent(ref: '#/components/schemas/BookingResource')
            ),
            new OA\Response(
                response: 500,
                description: 'Unable to create booking'
            )
        ]
    )]
    public function store(BookingRequest $request): JsonResponse
    {
        try {
            $booking = $this->bookingService->createBooking($request->validated());
            return response()->json(new BookingResource($booking), 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Unable to create booking'], 500);
        }
    }

    #[OA\Put(
        path: '/api/v1/bookings/{id}',
        summary: 'Update a booking',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/BookingRequest')
        ),
        tags: ['Bookings'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'Booking ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Booking updated successfully',
                content: new OA\JsonContent(ref: '#/components/schemas/BookingResource')
            ),
            new OA\Response(
                response: 500,
                description: 'Unable to update booking'
            )
        ]
    )]
    public function update(BookingRequest $request, $id): JsonResponse
    {
        try {
            $booking = $this->bookingService->updateBooking($id, $request->validated());
            return response()->json(new BookingResource($booking));
        } catch (Exception $e) {
            return response()->json(['error' => 'Unable to update booking'], 500);
        }
    }

    #[OA\Delete(
        path: '/api/v1/bookings/{id}',
        summary: 'Delete a booking',
        tags: ['Bookings'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'Booking ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Booking deleted successfully'
            ),
            new OA\Response(
                response: 500,
                description: 'Unable to delete booking'
            )
        ]
    )]
    public function destroy($id): JsonResponse
    {
        try {
            $this->bookingService->deleteBooking($id);
            return response()->json(['message' => 'Booking deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Unable to delete booking'], 500);
        }
    }

    #[OA\Get(
        path: '/api/v1/bookings',
        summary: 'Get all bookings',
        tags: ['Bookings'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful operation',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(ref: '#/components/schemas/BookingResource')
                )
            ),
            new OA\Response(
                response: 500,
                description: 'Unable to fetch bookings'
            )
        ]
    )]
    public function index(): JsonResponse
    {
        try {
            $bookings = $this->bookingService->getAllBookings();
            return response()->json(BookingResource::collection($bookings));
        } catch (Exception $e) {
            return response()->json(['error' => 'Unable to fetch bookings'], 500);
        }
    }
}
