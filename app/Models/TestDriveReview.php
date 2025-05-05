<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TestDriveRequest;

class TestDriveReview extends Model
{
    protected $fillable = [
        'test_drive_request_id',
        'review',
    ];

    public function testDriveRequest(): BelongsTo
    {
        return $this->belongsTo(TestDriveRequest::class);
    }
}
