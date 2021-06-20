<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HotelTransaction extends Model
{
    use HasFactory;

    protected $guarded =[];
    /**
     * Get all of the hotel_transaction_details for the HotelTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel_transaction_details(): HasMany
    {
        return $this->hasMany(HotelTransactionDetail::class);
    }

    /**
     * Get the user that owns the HotelTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
