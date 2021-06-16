<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Airplane extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the seats for the Airplane
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    /**
     * Get all of the airplane_transactions for the Airplane
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function airplane_transactions(): HasMany
    {
        return $this->hasMany(AirplaneTransaction::class);
    }

    /**
     * Get all of the schedules for the Airplane
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
