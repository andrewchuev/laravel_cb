<?php

use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\LocationScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('v1')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::apiResource('locations', LocationController::class);
    Route::apiResource('location-schedules', LocationScheduleController::class);
})->middleware('auth:sanctum');
