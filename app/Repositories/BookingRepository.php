<?php
namespace App\Repositories;

use App\Models\BookingAdditionalService;

class BookingRepository
{
    public function findById(int $id)
    {
        return BookingAdditionalService::findOrFail($id);
    }

    public function create(array $data)
    {
        return BookingAdditionalService::create($data);
    }

    public function update(int $id, array $data)
    {
        $booking = BookingAdditionalService::findOrFail($id);
        $booking->update($data);
        return $booking;
    }

    public function delete(int $id)
    {
        $booking = BookingAdditionalService::findOrFail($id);
        $booking->delete();
    }

    public function getAll()
    {
        return BookingAdditionalService::all();
    }
}
