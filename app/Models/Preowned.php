<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Inventory;

class Preowned extends Model
{
    use HasFactory;

    protected $table = 'preowned';

    protected $fillable = [
        'name',
        'mileage',
        'story',
        'color',
        'interior_color',
        'condition',
        'features',
        'purchase_date',
        'price',
        'image',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'price' => 'float',
        'mileage' => 'integer'
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
