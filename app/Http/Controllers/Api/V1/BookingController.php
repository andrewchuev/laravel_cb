<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Requests\BookingRequest;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }


    public function show($id): JsonResponse
    {
        try {
            $booking = $this->bookingService->getBookingById($id);
            return response()->json(new BookingResource($booking), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }


    public function store(BookingRequest $request): JsonResponse
    {
        try {
            $booking = $this->bookingService->createBooking($request->validated());
            return response()->json(new BookingResource($booking), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create booking'], 500);
        }
    }


    public function update(BookingRequest $request, $id): JsonResponse
    {
        try {
            $booking = $this->bookingService->updateBooking($id, $request->validated());
            return response()->json(new BookingResource($booking), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update booking'], 500);
        }
    }


    public function destroy($id): JsonResponse
    {
        try {
            $this->bookingService->deleteBooking($id);
            return response()->json(['message' => 'Booking deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete booking'], 500);
        }
    }


    public function index(): JsonResponse
    {
        try {
            $bookings = $this->bookingService->getAllBookings();
            return response()->json(BookingResource::collection($bookings), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch bookings'], 500);
        }
    }
}

