<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subject;
use App\Grade;
use App\Result;
 
class Dept extends Model
{
    //
    protected $fillable = [
        'name', 'description',
    ];

  public function users()
   {
   	return $this->hasMany('App\User'); 
   }

    public function subjects()
   {
   	return $this->hasMany('App\Subject','id'); 
   	
   }
    public function results()
   {
    return $this->hasMany('App\Result'); 
    
   }
   
 
  

}
