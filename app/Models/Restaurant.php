<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the foods for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }

    /**
     * Get the category that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
