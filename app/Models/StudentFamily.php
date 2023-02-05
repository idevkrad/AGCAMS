<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'father', 
        'mother',
        'spouse',
        'siblings', 
        'childrens',
        'structure_id',
        'parent_id',
        'user_id'
    ];

    public function structure()
    {
        return $this->belongsTo('App\Models\Dropdown', 'structure_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Dropdown', 'parent_id', 'id');
    }
}
