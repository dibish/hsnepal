<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    function homestay()
    {

        return $this->belongsTo(Homestay::class);
    }

    function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
