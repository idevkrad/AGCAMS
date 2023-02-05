<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'birthday', 
        'birth_place', 
        'information',
        'religion_id',
        'sex_id',
        'living_id',
        'civil_id',
        'ethnic_id',
        'user_id'
    ];

    public function religion()
    {
        return $this->belongsTo('App\Models\Dropdown', 'religion_id', 'id');
    }

    public function sex()
    {
        return $this->belongsTo('App\Models\Dropdown', 'sex_id', 'id');
    }

    public function living()
    {
        return $this->belongsTo('App\Models\Dropdown', 'living_id', 'id');
    }

    public function civil()
    {
        return $this->belongsTo('App\Models\Dropdown', 'civil_id', 'id');
    }

    public function ethnic()
    {
        return $this->belongsTo('App\Models\Dropdown', 'ethnic_id', 'id');
    }

}
