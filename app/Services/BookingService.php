<?php
namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    private BookingRepository $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getBookingById(int $id)
    {
        return $this->bookingRepository->findById($id);
    }

    public function createBooking(array $data)
    {
        return $this->bookingRepository->create($data);
    }

    public function updateBooking(int $id, array $data)
    {
        return $this->bookingRepository->update($id, $data);
    }

    public function deleteBooking(int $id)
    {
        return $this->bookingRepository->delete($id);
    }

    public function getAllBookings()
    {
        return $this->bookingRepository->getAll();
    }
}
