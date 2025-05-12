<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\CarModel;
use App\Models\TestDriveSchedule;
use App\Models\TestDriveReview;

class TestDriveRequest extends Model
{
    protected $fillable = [
        'user_id',
        'car_model_id',
        'request_date',
        'status',
        'note',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function schedule(): HasOne
    {
        return $this->hasOne(TestDriveSchedule::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(TestDriveReview::class);
    }
}
