<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statsu extends Model
{
    use HasFactory;

    protected $table = 'statsu';

    protected $fillable = [
        'userid',
        'status',
    ];
}
