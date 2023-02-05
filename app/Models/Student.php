<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_international',
        'status_id', 
        'year_id',
        'course_id',
        'user_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\Dropdown', 'year_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Dropdown', 'status_id', 'id');
    }
}
