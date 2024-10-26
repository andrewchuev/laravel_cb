<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingConsignmentGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'temperature_mode_id',
        'total_qty',
        'total_spaces',
        'total_volume',
        'total_weight',
    ];

    public function bookingConsignments()
    {
        return $this->hasMany(BookingConsignment::class);
    }

    public function bookingConsumables()
    {
        return $this->hasMany(BookingConsumables::class);
    }

    public function temperatureMode()
    {
        return $this->belongsTo(TemperatureMode::class);
    }
}   
