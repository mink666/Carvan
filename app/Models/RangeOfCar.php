<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CarModel;

class RangeOfCar extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class, 'range_of_cars_id');
    }
}
