<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batters extends Model
{
    use HasFactory;

    protected $table = 'batters';

    protected $fillable = [
        'name',
        'hand',
        'jersey',
    ];
}
