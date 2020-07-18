<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Result;
use App\User;
use App\Dept; 
use App\Semester;
use App\Grade;
use App\Subject;
use App\Year; 
use Session;


 //Laravel Framework 7.5.2
//Laravel Framework 7.15.0

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
      
    }
     public function selectResult()
    {
        //  
      $grades = Grade::all();
      $years = Year::all();
      $depts = Dept::all()->pluck('name','id');
      $semesters = Semester::all();
      $users = User::all();
      $subjects = Subject::all();  
      // $subjects = Subject::all()->pluck('name','id');

    //  dd($years);

      return view ('results.selectResult',compact('depts'))->withUsers($users)->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withSubjects($subjects)->withYears($years);
      
    }

     public function insertResult(Request $request)
    {
        
    
       //dd($request->all());
        //dd($request->grade_id);
         $dept = $request->dept;
         $semester = $request->semester_id;
         $grade = $request->grade_id;
         $subject = $request->subject;
         $year = $request->year;
 
         $users = User::where('dept_id', $dept)
         ->where('semester_id',$semester)
         ->where('grade_id',$grade)
         ->get(); 
        //dd($users);  
         
       return view ('results.insertResult')->withUsers($users)->withDept($dept)->withSemester($semester)->withGrade($grade)->withSubject($subject)->withYear($year);
        

      
    }

    public function getdepts($id)
    {
        // 
      $subjects = Subject::where('dept_id',$id)->pluck('name','id');

      return json_encode ($subjects);
      
    } 
       
        public function showtResult(Request $request)
    {
        // form to get Result
        //dd($request->all());
          $grades = Grade::all();
          $years = Year::all();
          $depts = Dept::all()->pluck('name','id');
          $semesters = Semester::all();
         
        return view ('results.showtResult')->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withYears($years);
      
    }  
    public function getsubject($id)
    {
        // 
      $subjects = Subject::where('dept_id',$id)->pluck('name','id');

      return json_encode ($subjects);
      
    } 
    public function getResult(Request $request)
    {
        
    
        //dd($request->all());
       
         $dept = $request->dept;
         $semester_id = $request->semester_id;
         $grade_id = $request->grade_id;
         $year = $request->year;
          
        $getusers = User::where('dept_id',$dept)
        ->where('semester_id',$semester_id)
        ->get();

        $users = User::where('dept_id',$dept)
        ->where('semester_id',$semester_id)
        ->pluck('id');

         foreach($users as  $user )
         {
            
            $results = Result::select('mark','grad','subject_id' )
            ->where('dept_id',$dept)
            ->where('user_id',$user)
            ->where('semester_id',$semester_id )
            ->with('subjects')
            ->get();
             
         }
        
         //dd($results)->toArray();
         $subjects =Subject::where('dept_id',$dept)
         ->where('semester_id',$semester_id)
         ->get();

        // foreach($results as $result )
        // {
        //    $result->user->name;

        // }
         
         //->pluck('id')
         // ->toArray()
         //dd($results);
         //foreach($request->user_id as $index => $user_id) 


          // dd($subject);
         // dd($resultvalue);getusers
         
       return view ('results.finalResult')->withUsers($users)->withGetusers($getusers)->withResults($results)->withSubjects($subjects);
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $grades = Grade::all();
      $depts = Dept::all();
      $semesters = Semester::all();
      $users = User::all();

      return view ('results.create')->withUsers($users)->withDepts($depts)->withSemesters($semesters)->withGrades($grades);
            
    } 
    
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      //
     //dd($request->all());

      foreach($request->user_id as $index => $user_id) 

       {
            $result = new Result;
            
            //$result->subject_id = $request->subject;
            $result->year_id = $request->year;
            $result->dept_id = $request->dept[$index];
            $result->semester_id = $request->semester[$index];
            $result->grade_id = $request->grade[$index];
            $result->user_id = $user_id;
            $result->mark = $request->mark[$index];
            
            if ($request->mark[$index] == "111" ) {
                $result->grad = "ABS";
            }
            elseif ($request->mark[$index] == "222" ) {
                $result->grad = "S";
            }

            elseif ($request->mark[$index] >= "80") {
               $result->grad = "A";
            }

            elseif ($request->mark[$index] < "80" && $request->mark[$index] >= "70") {
                $result->grad = "B";
            }
            elseif ($request->mark[$index] < "70" && $request->mark[$index] >= "60") {
                $result->grad = "C";
            }
            elseif ($request->mark[$index] < "60" && $request->mark[$index] >= "50") {
                $result->grad = "D";
            }
        
            else
            {
                $result->grad = "F";
            }

            $result->save();

            $result->subjects()->sync($request->subject);

        }

 
       Session::flash('success','تم الحفظ بنجاح');
        
       return redirect()->route('selectResult')->with('message','تم التعديلالأضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
