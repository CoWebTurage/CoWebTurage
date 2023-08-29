<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'comment',
        'stars',
        'reviewer_id',
        'reviewed_id',
    ];

    protected $casts = [
        'stars' => 'float'
    ];

    protected $with = [
        'reviewer'
    ];

    public function reviewer(): BelongsTo {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewed(): BelongsTo {
        return $this->belongsTo(User::class, 'reviewed_id');
    }
}
