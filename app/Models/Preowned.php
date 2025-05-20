<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use App\Models\Inventory;

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

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/default.png');
        }
        if (Str::startsWith($this->image, 'storage/')) {
            return asset($this->image);
        }

        if (Storage::exists($this->image)) {
            return asset('storage/' . $this->image);
        }
        return asset($this->image);
        }

    // public function inventory(): BelongsTo
    // {
    //     return $this->belongsTo(Inventory::class);
    // }
}
