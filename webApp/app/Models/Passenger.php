<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Passenger extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'trip_id',
        'status',
        'place',
    ];

    protected $with = [
        'user',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function trip(): BelongsTo {
        return $this->belongsTo(Trip::class);
    }
}
