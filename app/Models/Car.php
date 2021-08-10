<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use Uuids, HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'license_plate',
        'color',
        'enable',
        'user_id'
    ];

    public function garage(): HasOne
    {
        return $this->hasOne(GarageSpace::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
