<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id' , 'user_id', 'college_id'
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Dropdown', 'role_id', 'id');
    }

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id', 'id');
    }



}
