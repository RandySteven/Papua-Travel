<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name', 'hotel_image', 'slug', 'hotel_address', 'hotel_description', 'slug', 'ratingId'
    ];
    /**
     * Get the rating that owns the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class, 'ratingId');
    }

    /**
     * Get all of the rooms for the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Get all of the hotel_transactions for the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel_transactions(): HasMany
    {
        return $this->hasMany(HotelTransaction::class);
    }
}
