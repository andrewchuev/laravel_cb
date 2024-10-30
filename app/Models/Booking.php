<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_status',
        'payment_status',
        'name',
        'company',
        'email',
        'phone_number',
        'job_reference',
        'dangerous_goods',
        'pickup_detail_id',
        'delivery_detail_id',
        'final_price',
        'total_qty',
        'total_spaces',
        'total_volume',
        'total_weight',
        'state_id',
        'area_id',
    ];

    public function pickupDetail()
    {
        return $this->belongsTo(PickupDetail::class);
    }

    public function deliveryDetail()
    {
        return $this->belongsTo(DeliveryDetail::class);
    }

    public function bookingAdditionalServices()
    {
        return $this->hasMany(BookingAdditionalService::class);
    }

    public function bookingPalletManagement()
    {
        return $this->hasMany(BookingPalletManagement::class);
    }

    public function bookingConsignmentGroups()
    {
        return $this->hasMany(BookingConsignmentGroup::class);
    }

}
