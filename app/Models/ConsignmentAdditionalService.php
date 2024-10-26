<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsignmentAdditionalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignment_id',
        'additional_service_id',
        'booking_consignment_group_id',
        'qty',
        'value',
    ];

    public function additionalService()
    {
        return $this->belongsTo(AdditionalService::class);
    }
}
