<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detour extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'location',
        'trip_id',
    ];
}
