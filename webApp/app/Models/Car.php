<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'plate',
        'seats',
        'model',
        'color',
        'user_id',
    ];

    protected $casts = [
        'seats' => 'int',
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
