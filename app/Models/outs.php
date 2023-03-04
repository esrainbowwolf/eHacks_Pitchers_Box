<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outs extends Model
{
    use HasFactory;

    protected $table = 'outs';

    protected $fillable = [
        'pid',
        'type',
        '0',
        '1',
        '2',
        '3',
    ];
}
