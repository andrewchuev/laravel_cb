<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'using_id',
        'max_qty',
        'price',
    ];

    /*public function type()
    {
        return $this->belongsTo(Option::class);
    }*/
}
