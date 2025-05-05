<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TestDriveRequest;
use App\Models\User;

class TestDriveSchedule extends Model
{
    protected $fillable = [
        'test_drive_request_id',
        'scheduled_date',
        'location',
        'updated_by',
    ];

    public function testDriveRequest(): BelongsTo
    {
        return $this->belongsTo(TestDriveRequest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
