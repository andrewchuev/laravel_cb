<?php
namespace App\Services;

use App\Repositories\BookingRepository;
use App\Repositories\DeliveryDetailRepository;
use App\Repositories\PickupDetailRepository;
use Illuminate\Support\Facades\DB;

class BookingService
{
    private BookingRepository $bookingRepository;
    protected $pickupDetailRepository;
    protected $deliveryDetailRepository;

    public function __construct(BookingRepository $bookingRepository, PickupDetailRepository $pickupDetailRepository, DeliveryDetailRepository $deliveryDetailRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->pickupDetailRepository = $pickupDetailRepository;
        $this->deliveryDetailRepository = $deliveryDetailRepository;
    }

    public function getBookingById(int $id)
    {
        return $this->bookingRepository->findById($id);
    }

    public function createBooking(array $data)
    {
        return DB::transaction(function () use ($data) {
            $pickupDetail = $this->pickupDetailRepository->create($data['pickup_details']);
            $deliveryDetail = $this->deliveryDetailRepository->create($data['delivery_details']);
            $data['pickup_detail_id'] = $pickupDetail->id;
            $data['delivery_detail_id'] = $deliveryDetail->id;
            return $this->bookingRepository->create($data);
        });
        //return $this->bookingRepository->create($data);
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
