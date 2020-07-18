<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\User; 
use App\Dept;   
use App\Semester;  
use App\Grade;  
use App\Subject;
use App\Year; 
use App\Gpa; 
use Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        
        $results = Result::where('user_id',$user_id)
        ->with('semester','subjects')
        ->get();
        
        //->toArray()
          
              foreach($results as $result )
                    {
                       //dd();
                       $x[] =$result->semester->name;
                    }
                   $xs = collect($x)->unique();
         

 
 

        return view('home',compact('results','xs'));
    }
}
