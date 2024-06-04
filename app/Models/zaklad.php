<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zaklad extends Model
{
    use HasFactory;

    protected $table ='zv';
    protected $primaryKey = 'id';
    protected $fillable = [
        'userid',
        'carid',
        
    ];
}
