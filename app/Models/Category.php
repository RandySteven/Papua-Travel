<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the restaurants for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }
}
