<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScholastic extends Model
{
    use HasFactory;

    protected $fillable = [
        'schools', 
        'awards', 
        'user_id'
    ];
}
