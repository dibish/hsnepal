<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function bills()
    {
        return $this->hasMany(Bill::class);
    }

    function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
