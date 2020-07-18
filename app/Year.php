<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Result;

class Year extends Model
{
    //
     protected $fillable = [
        'year',
    ]; 
    public function result()
    {
        return $this->hasMany('App\Result');
    }
}
