<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Auth;
use App\Models\course;
use App\Models\enrolment;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'active',
    ];
    
    
    //add list of courses for user
    // public function emailPref()
    // {
    //     return $this->hasOne('courses_user');
    // }
    
    public function getuserCoursesAttribute()
    {
        $user_courses = [];
        $enrolments = enrolment::all();
        $courses = course::all();
        foreach($enrolments as $enrolment){
            if($enrolment->id_user == Auth::user()->id){
                foreach($courses as $course){
                    if($enrolment->id_course ==   $course->id){
                        array_push($user_courses, $course);
                    }
                }
            }
            
        }
        
    return $user_courses;
    }
    //relationship with enrolments
    public function enrolments(){
        return $this->hasMany('App\Models\enrolment','id_user');
    }
    
    //relationship with courses
    public function courses(){
        return $this->hasMany('App\Models\course','id_user');
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
