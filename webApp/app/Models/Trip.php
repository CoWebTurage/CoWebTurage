<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'start_location',
        'end_location',
        'start_time',
        'end_time',
        'price',
        'car_id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'price' => 'float',
    ];

    protected $with = [
        'driver',
        'car'
    ];

    public function driver() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class);
    }

    public function passengers(): HasMany {
        return $this->hasMany(Passenger::class);
    }

    public function detours(): HasMany {
        return $this->hasMany(Detour::class)->orderBy('order');
    }
}
