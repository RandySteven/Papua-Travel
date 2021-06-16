<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rating extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the hotels for the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }
}
