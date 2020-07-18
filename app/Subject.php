<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Dept;
use App\Result;
use App\Semester;


 
class Subject extends Model
{
    protected $table = 'subjects';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'dept_id');

    //
     
    
    public function dept()  
     {
      return $this->belongsTo('App\Dept'); 
     } 
     public function results()  
     {
      return $this->belongsToMany('App\Result','result_subject')->withTimestamps();
     } 
     public function semester()  
     {
      return $this->belongsTo('App\Semester'); 
     } 
      
 
}
