<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AirplaneTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the AirplaneTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the airplane that owns the AirplaneTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airplane(): BelongsTo
    {
        return $this->belongsTo(Airplane::class, 'airplane_id');
    }
}
