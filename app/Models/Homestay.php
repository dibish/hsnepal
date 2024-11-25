<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Homestay extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'email', 'address', 'cover_photo', 'status', 'user_id'];


    function HomestayOwner(): BelongsTo
    {
        return $this->belongsTo(HomestayOwner::class);
    }
    function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    function amenities(): HasMany
    {
        return $this->hasMany(Amenities::class);
    }

    function reviews()
    {
        return $this->hasMany(Review::class);
    }

    function inquires()
    {
        return $this->hasMany(Inquiry::class);
    }

    function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }
}
