<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Garage extends Model
{
    use Uuids, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'garages';

    protected $fillable = [
        'address',
        'description',
        'number',
        'enable'
    ];

    public function garageSpace(): HasMany
    {
        return $this->hasMany(GarageSpace::class);
    }
}
