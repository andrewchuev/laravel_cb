<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_type',
        'delivery_time_type',
        'location_id',
        'address',
        'lng',
        'lat',
        'date',
        'timeslot_from',
        'timeslot_to',
        'office_time',
        'contact_name',
        'contact_phone',
        'contact_email',
        'company_name',
        'company_email',
        'special_instructions',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
