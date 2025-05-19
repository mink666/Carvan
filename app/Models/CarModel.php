<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Inventory;
use App\Models\Brand;
use App\Models\RangeOfCar;

class CarModel extends Model
{
    protected $fillable = [
        'brand_id',
        'range_of_cars_id',
        'name',
        'year',
        'description',
        'image',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function rangeOfCars(): BelongsTo
    {
        return $this->belongsTo(RangeOfCar::class, 'range_of_cars_id');
    }

    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class, 'car_model_id');
    }
}
