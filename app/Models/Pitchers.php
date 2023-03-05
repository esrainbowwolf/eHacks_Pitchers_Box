<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitchers extends Model
{
    use HasFactory;

    protected $table = 'pitchers';

    protected $fillable = [
        'name',
        'hand',
        'jersey',
        'gid',
    ];
    public $timestamps = false;
}
