<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Gpa extends Model
{
    //
    protected $table = 'gpas';
    protected $fillable = array('user_id','semester_id', 'mark', 'F','gpa');

     public function user() 
     {
       return $this->belongsTo('App\User');
     } 

} 
 