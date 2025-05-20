<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CarModel;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'company_full_name',
        'year',
        'founder',
        'description',
        'logo',
        'motto',
        'website_url',
        'cover_image',
        'key_achievements',
        'location',
        'is_active'
    ];

    protected $casts = [
        'key_achievements' => 'array', // Convert JSON to array but currently doesnt work
        'year' => 'integer',
    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
