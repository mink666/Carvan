<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Inventory;

class Preowned extends Model
{
    protected $table = 'preowned';
    
    protected $fillable = [
        'inventory_id',
        'mileage',
        'story',
        'condition',
        'purchase_date',
        'price',
        'image',
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
