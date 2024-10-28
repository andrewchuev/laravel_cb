<?php
namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function findById(int $id)
    {
        return Booking::findOrFail($id);
    }

    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function update(int $id, array $data)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($data);
        return $booking;
    }

    public function delete(int $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
    }

    public function getAll()
    {
        return Booking::all();
    }
}
