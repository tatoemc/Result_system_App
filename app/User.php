<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Dept;
use App\Semester;
use App\Grade;
use App\Result;
use App\Gpa;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password','images', 'dept_id', 'grade_id','semester_id','universit_id','user_type','gender',);
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dept()  
     {
       return $this->belongsTo('App\Dept');
     } 
     public function semester() 
     {
       return $this->belongsTo('App\Semester');
     } 
     public function grade() 
     {
       return $this->belongsTo('App\Grade');
     }  
      
     
     public function results()
     {
      return $this->hasMany('App\Result');
     }
     public function gpas()
     {
      return $this->hasMany('App\Gpa');
     }
     

}
