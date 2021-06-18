<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AirplaneTransactionDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the seat that owns the AirplaneTransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    /**
     * Get the airplane_transaction that owns the AirplaneTransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airplane_transaction(): BelongsTo
    {
        return $this->belongsTo(AirplaneTransaction::class, 'airplane_transaction_id');
    }
}
