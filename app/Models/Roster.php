<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $table = 'roster';

    protected $fillable = [
        'name',
        'is_pitcher',
        'tid'
    ];
    public $timestamps = false;
}
