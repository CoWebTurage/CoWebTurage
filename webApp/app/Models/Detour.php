<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detour extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'location',
        'order',
        'trip_id',
    ];
}
