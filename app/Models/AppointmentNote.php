<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'concern' , 'intervention','need_supervision'
    ];
}
