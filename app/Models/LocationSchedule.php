<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'day_number',
        'from',
        'to'
    ];

}