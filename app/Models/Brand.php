<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CarModel;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'year',
        'description',
        'logo',
        'location',
    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
