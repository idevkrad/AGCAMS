<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Spatie\WelcomeNotification\ReceivesWelcomeNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Traits\ImageUploadTrait;
use App\Jobs\EmailNewAccount;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ReceivesWelcomeNotification, ImageUploadTrait; 

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'is_active',
        'avatar',
        'welcome_valid_until'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    } 

    public function roles()
    {
        return $this->hasMany('App\Models\Staff', 'user_id');
    } 

    public function hasRole($roles)
    {
        foreach ($roles as $role) {
            if ($this->role == $role) {
                return true;
            }
        }
        return false;
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function staffs()
    {
        return $this->hasMany('App\Models\Staff', 'user_id');
    } 

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'user_id');
    } 

    public function education()
    {
        return $this->hasOne('App\Models\StudentEducation', 'user_id');
    } 

    public function family()
    {
        return $this->hasOne('App\Models\StudentFamily', 'user_id');
    } 

    public function health()
    {
        return $this->hasOne('App\Models\StudentHealth', 'user_id');
    } 

    public function languages()
    {
        return $this->hasMany('App\Models\StudentLanguage', 'user_id');
    } 

    public function scholastic()
    {
        return $this->hasOne('App\Models\StudentScholastic', 'user_id');
    } 

    public function info()
    {
        return $this->hasOne('App\Models\StudentInfo', 'user_id');
    } 

    public function appointmentStudent()
    {
        return $this->hasMany('App\Models\Appointment', 'student_id');
    } 

    public function appointmentCounselor()
    {
        return $this->hasMany('App\Models\Appointment', 'counselor_id')->count();
    } 

}
