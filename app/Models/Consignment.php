<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'max_qty',
        'max_length',
        'max_width',
        'max_height',
        'max_weight',
        'additional_service_id'
    ];

    public function additionalService()
    {
        return $this->belongsTo(AdditionalService::class);
    }
}
