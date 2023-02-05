<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'user_id'
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Dropdown', 'language_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
