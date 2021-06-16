<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the airplane that owns the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airplane(): BelongsTo
    {
        return $this->belongsTo(Airplane::class, 'airplane_id');
    }
}
