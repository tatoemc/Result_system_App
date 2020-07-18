<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Dept;
use App\Result;

class Grade extends Model
{
    //
    protected $fillable = [
        'name',
    ];

     public function users()
   {
   	return $this->hasMany('App\User'); 
   }

    public function results()
   {
   	return $this->hasMany('App\Result'); 
   }
    
}
