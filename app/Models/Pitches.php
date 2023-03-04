<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitches extends Model
{
    use HasFactory;

    protected $table = 'pitches';

    protected $fillable = [
        'is_strike',
        'zone',
        'speed',
        'type',
        'pid',
    ];
}
