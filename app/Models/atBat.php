<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atBat extends Model
{
    use HasFactory;

    protected $table = 'at_bat';

    protected $fillable = [
        'pitches',
        'outcome',
        'pid',
        'bid',
    ];
}
