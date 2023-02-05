<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 
        'lastname', 
        'middlename',
        'suffix',
        'gender',
        'mobile',
        'user_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = ucwords(strtolower($value));
    }

    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = ucwords(strtolower($value));
    }

    public function setMiddlenameAttribute($value)
    {
        $this->attributes['middlename'] = ucwords(strtolower($value));
    }

}
