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


    function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }
    function rooms(): HasMany
    {

        return $this->hasMany(Room::class);
    }
    function amenities(): HasMany
    {

        return $this->hasMany(Amenities::class);
    }
}
