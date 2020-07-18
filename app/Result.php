<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subject;
use App\Semester;
use App\Grade;
use App\Dept;
use App\Year;

class Result extends Model
{
    //

    protected $table = 'results';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('user_id','subject_id', 'mark','grad','dept_id','year_id','grade_id','semester_id');
   
  
      public function user() 
   {
    return $this->belongsTo('App\User');
    
   }
      public function subjects()  
   {
    
    return $this->belongsToMany('App\Subject','result_subject')->withTimestamps();
   }
     public function semester() 
   {
    return $this->belongsTo('App\Semester');
   }
    public function grade()  
   {
    return $this->belongsTo('App\Grade');
   }
   public function dept()  
   {
    return $this->belongsTo('App\Dept');
   }
   public function year()
    {
        return $this->belongsTo('App\Year');
    }

}

 





