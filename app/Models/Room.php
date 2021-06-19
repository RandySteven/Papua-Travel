<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the hotel that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /**
     * Get all of the hotel for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel_transaction_details(): HasMany
    {
        return $this->hasMany(HotelTransactionDetail::class);
    }
}
