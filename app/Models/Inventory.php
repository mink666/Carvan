<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CarModel;
use App\Models\Preowned;
use App\Models\TestDriveRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';

    protected $fillable = [
        'car_model_id',
        'color',
        'interior_color',
        'price',
        'features',
        'quantity',
        'is_active',
        'is_preowned',
        'status',
    ];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    // public function preowned(): HasOne
    // {
    //     return $this->hasOne(Preowned::class);
    // }

    public function testDriveRequests(): HasMany
    {
        return $this->hasMany(TestDriveRequest::class);
    }
}
