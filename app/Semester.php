<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subject;
use App\Result;

class Semester extends Model
{
    protected $table = 'semesters';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'grade_id');
    //
   
    public function users()
   {
   	return $this->hasMany('App\User'); 
   }
   public function subjects()
   {
   	return $this->hasMany('App\Subject'); 
   }
   public function results()
   {
   	return $this->hasMany('App\Result'); 
   }
}
