<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'counselor_id', 'method_id', 'purpose_id', 'date', 'status_id'
    ];

    public function method()
    {
        return $this->belongsTo('App\Models\Dropdown', 'method_id', 'id');
    }

    public function purpose()
    {
        return $this->belongsTo('App\Models\Dropdown', 'purpose_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Dropdown', 'status_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id', 'id');
    }

    public function counselor()
    {
        return $this->belongsTo('App\Models\User', 'counselor_id', 'id');
    }

    public function getDateAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function note()
    {
        return $this->hasOne('App\Models\AppointmentNote', 'appointment_id');
    } 

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }
}
