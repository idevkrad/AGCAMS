<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHealth extends Model
{
    use HasFactory;

    protected $fillable = [
        'height', 
        'weight', 
        'disabilities',
        'doyous',
        'haveyous',
        'user_id'
    ];
}
