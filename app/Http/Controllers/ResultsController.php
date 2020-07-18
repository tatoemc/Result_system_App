<?php
 
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Result;
use App\User; 
use App\Dept;   
use App\Semester;  
use App\Grade;  
use App\Subject;
use App\Year; 
use App\Gpa; 
use Session;



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
     public function selectResult(Request $request)
    {
        //  
      $grades = Grade::all();
      $years = Year::all();
      $depts = Dept::all()->pluck('name','id');
      $semesters = Semester::all();
      $users = User::all();
      $subjects = Subject::all();  
      //insertResult
      if ($request->subject) 
        {
             $dept = $request->dept;
             $semester = $request->semester_id;
             $grade = $request->grade_id;
             $subject = $request->subject;
             $year = $request->year;
             

             $subjects = Subject::where('semester_id',$semester)->count();
            //dd($semester);

             if ($subjects != 0) {
                $users = User::where('dept_id', $dept)
                 ->where('user_type','stu')
                 //->where('semester_id',$semester)
                 ->where('grade_id',$grade)
                 ->get();
               } 
               else
               {
                  $users = [];
               } 
            //dd($users);  
             
           return view ('results.main.insertResult')->withUsers($users)->withDept($dept)->withSemester($semester)->withGrade($grade)->withSubject($subject)->withYear($year);

        }//end of main if
     
      return view ('results.main.selectResult',compact('depts'))->withUsers($users)->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withSubjects($subjects)->withYears($years);
      
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
        
          $grades = Grade::all();
          $years = Year::all();
          $depts = Dept::all()->pluck('name','id');
          $semesters = Semester::all();

          if ($request->dept) 
            {
                 $dept = $request->dept;
                 $semester_id = $request->semester_id;
                 $sem = $request->semester_id;
                 $grade_id = $request->grade_id;  
                 $year = $request->year; 
         
                $grades = Grade::all();
                $years = Year::all();
                $depts = Dept::all()->pluck('name','id');
                $semesters = Semester::all();
                
               
                 $deptname = Dept::where('id',$dept)->pluck('name');
                 $semestername = Semester::where('id',$semester_id)->pluck('name');
                 $gradename = Grade::where('id',$grade_id)->pluck('name');
                 $yearname = Year::where('id',$year)->pluck('year');
               
               
               $users = User::where('dept_id',$dept)
                        ->where('user_type','stu')
                        ->where('grade_id',$grade_id)
                        ->with('results.subjects')
                        ->with([ 
                            'results' => function ($query) use ($year, $semester_id) {
                                $query->where(function ($q) use ($year, $semester_id) {
                                    $q->where('semester_id', $semester_id); //This can accept more where() condition
                                    $q->where('year_id','=',$year);
                                });
                            }])
                        ->with('gpas')
                        ->get();
                      
                        /*
                        with([
                            'results' => function ($query) use ($year_id, $user_id) {
                                $query->where(function ($q) use ($year_id, $user_id) {
                                    $q->where('user_id', $user_id); //This can accept more where() condition
                                })->where('year_id','=',$year_id)->with('grade','subjects','year');
                            }])->whereHas('results')
                            */
                      if (!$users->isEmpty()) 
                       {
                             foreach($users as $item )
                            {
                                 
                                foreach($item->gpas as $gpa )
                                {
                                       //dd($gpa->toArray());
                                       $gpas[] = $gpa->gpa;
                                       
                                       
                                }
                                foreach($item->results as $result )
                                {
                                    
                                    foreach($result->subjects as  $subject )
                                    {

                                        $subjects[] = $subject->name;
                                        
                                    }


                                }
                            } 
                            
                            $subjects= collect($subjects)->unique();
                           
                      }//end f
                      else
                      {
                        $subjects=[];
                        
                      }
                      
               return view ('results.main.finalResult')->withSubjects($subjects)->withDeptname($deptname)->withSemestername($semestername)->withGradename($gradename)->withYearname($yearname)->withUsers($users)->withSem($sem);
      

            }//end of main if
             
        return view ('results.main.showtResult')->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withYears($years);
      
    }  

    public function showtResultWithGrade(Request $request)
    {
        
          $grades = Grade::all();
          $years = Year::all();
          $depts = Dept::all()->pluck('name','id');
          $semesters = Semester::all();
          //get getResultWithGrade
          if ($request->dept) 
            {
                $dept = $request->dept;
                 $semester_id = $request->semester_id;
                 $grade_id = $request->grade_id;  
                 $year = $request->year; 
                 $sem = $request->semester_id;
         
                $grades = Grade::all();
                $years = Year::all();
                $depts = Dept::all()->pluck('name','id');
                $semesters = Semester::all();
                
                 $deptname = Dept::where('id',$dept)->pluck('name');
                 $semestername = Semester::where('id',$semester_id)->pluck('name');
                 $gradename = Grade::where('id',$grade_id)->pluck('name');
                 $yearname = Year::where('id',$year)->pluck('year');

                 $users = User::where('dept_id',$dept)
                        ->where('user_type','stu')
                        ->where('grade_id',$grade_id)
                        ->with('results.subjects')
                         ->with([
                            'results' => function ($query) use ($year, $semester_id) {
                                $query->where(function ($q) use ($year, $semester_id) {
                                    $q->where('semester_id', $semester_id); //This can accept more where() condition
                                    $q->where('year_id','=',$year);
                                });
                            }])
                        ->with('gpas') 
                        ->get(); 
                  /*
                  with([
                          'results' => function ($query) use ($year_id, $user_id) {
                              $query->where(function ($q) use ($year_id, $user_id) {
                                  $q->where('user_id', $user_id); //This can accept more where() condition
                              })->where('year_id','=',$year_id)->with('grade','subjects','year');
                          }])->whereHas('results')
                          */
                 // dd ($users);
                        if (!$users->isEmpty()) 
                        {
                               foreach($users as $item )
                            {
                                foreach($item->results as $result )
                                {
                                    foreach($result->subjects as  $subject )
                                    {
                                        $subjects[] = $subject->name;
                                        
                                    }

                                }
                            }  
                            $subjects= collect($subjects)->unique(); 
                        }//end if
                        else{
                          $subjects= [];
                        }
                      
               return view ('results.main.finalResultResultWithGrade')->withSubjects($subjects)->withDeptname($deptname)->withSemestername($semestername)->withGradename($gradename)->withYearname($yearname)->withUsers($users)->withSem($sem);
              

            }//end of main if
         
        return view ('results.main.showtResultWithGrade')->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withYears($years);
      
    }  

    
    public function getsubject($id)
    {
        // 
      $subjects = Subject::where('dept_id',$id)->pluck('name','id'); 

      return json_encode ($subjects);
      
    } 
    
    public function create()
    {
        //
      $grades = Grade::all();
      $depts = Dept::all();
      $semesters = Semester::all();
      $users = User::all();

      return view ('results.create')->withUsers($users)->withDepts($depts)->withSemesters($semesters)->withGrades($grades);
            
    } 
    
    public function store(Request $request)
    {
      
     

      foreach($request->user_id as $index => $user_id) 

       {
            $result = new Result;
            //dd($user_id);
            $result->subject_id = $request->subject;
            $result->dept_id = $request->dept;
            $result->year_id = $request->year;
            $result->grade_id = $request->grade[$index];
            $result->semester_id = $request->semester[$index];
            $result->user_id = $user_id;
            $result->mark = $request->mark[$index];
            
            if ($request->mark[$index] == 111 ) {
                $result->grad = "ABS";
                $result->mark = 0;

            }
            elseif ($request->mark[$index] == 222 ) {
                $result->grad = "S";
                $result->mark = 0;
            }

            elseif ($request->mark[$index] >= 80) {
               $result->grad = "A";
            }

            elseif ($request->mark[$index] < 80 && $request->mark[$index] >= 70) {
                $result->grad = "B";
            }
            elseif ($request->mark[$index] < 70 && $request->mark[$index] >= 60) {
                $result->grad = "C";
            }
            elseif ($request->mark[$index] < 60 && $request->mark[$index] >= 50) {
                $result->grad = "D";
            }
        
            else 
            {
                $result->grad = "F";
            }
             
            

             $result->save();

            $result->subjects()->sync($request->subject);
            //insert Gpa
              $u = $user_id;
            $semester_id = $request->semester[$index];
                 $marksum = Result::select('mark')
                 ->where('semester_id',$semester_id)
                 ->where('user_id',$u)->sum('mark');

                 $gba = $marksum / 10;
                 
             
                 $check = Gpa::select('mark')
                 ->where('user_id',$u)     
                 ->where('semester_id',$semester_id)
                 ->get()->count();

             //dd($check);

                 $checkf = Result::where('user_id',$u)
                 ->where('semester_id',$semester_id)
                 ->where(function($query) {
                    $query->where('grad', 'like', '%F%')
                          ->orwhere('grad', 'like', '%ABS%') ;
                   })
                 ->get()->count();
                 
        
                 //dd($check);

                 if ($check == 0) 
                 {

                        DB::table('gpas')->insert(
                             array(
                                    'user_id'   =>   $u,
                                    'semester_id' => $semester_id,
                                    'mark'   =>   $marksum,
                                    'gpa'   =>   $gba,
                                    'F' => $checkf
                                    
                             )
                        );
                 }
                  else {
                    DB::table('gpas')
                    ->where('user_id', $u)
                    ->where('semester_id', $semester_id)
                    ->update([
                         'mark'   =>   $marksum,
                         'gpa'   =>   $gba,
                         'F' => $checkf
                    ]);
                 }
                 
     

        }
  
       Session::flash('success','تم الحفظ بنجاح');
        
       return redirect()->route('result.selectResult')->with('message','تم أضافة النتيجة بنجاح');
    }

    public function oneSemester(Request $request)
    {
        //
            $depts = Dept::all();
            $semesters = Semester::all(); 
            //getoneSemester
            if ($request->universit_id) 
                {
                     $semester_id = $request->semester_id; 
                     $universit_id = $request->universit_id;
                     $users = User::where('universit_id',$universit_id)   
                            ->where('semester_id',$semester_id)    
                            ->with('results.subjects') 
                            ->get(); 
                                   
                    return view('results.main.showtoneSemester')->withUsers($users);
               

                }//end of main if

        return view('results.main.oneSemester')->withDepts($depts)->withSemesters($semesters);
    }
    

     public function details()
    {
        //  
            $depts = Dept::all();

        return view('results.main.details')->withDepts($depts);
    }

     public function getdetails(Request $request)
    {
        // 
       // dd($request->all()); 
            $dept = $request->semester_id; 
            $universit_id = $request->universit_id;
 
        return view('results.main.showdetails')->withDept($dept)->withSemesters($semesters);
    }

     public function appendices(Request $request)
    {
          $grades = Grade::all();
          $years = Year::all();
          $depts = Dept::all()->pluck('name','id');
          $semesters = Semester::all();
          //getAppendices
          if ($request->subject) 
            {
              //dd($request->all());
                $year_id = $request->year;
                $subject_id = $request->subject;
                $dept_id = $request->dept; 
                $semester_id = $request->semester; 
                $grade_id = $request->grade;
                $subject_id = $request->subject;

                $results = Result::where('dept_id',$dept_id)
                     ->where('grade_id',$grade_id)
                     ->where('semester_id',$semester_id)
                     ->where('subject_id',$subject_id)
                     ->where(function($query) {
                        $query->where('grad', 'like', '%F%')
                              ->orwhere('grad', 'like', '%ABS%') ;
                       })
                     
                     ->with('user','subjects')
                     ->get();
                       
                $grade = Grade::where('id',$grade_id)->pluck('name');
                $dept = Dept::where('id',$dept_id)->pluck('name');
                $semester = Semester::where('id',$semester_id)->pluck('name');
                $subject = Subject::where('id',$subject_id)->pluck('name');
                $year = Year::where('id',$year_id)->pluck('year');
                //dd($years);
                      
           
                    //$subjects= collect($subjects)->unique();
              
                return view('results.appendices.showNameAppendices')->withResults($results)->withGrade($grade)->withSemester($semester)->withDept($dept)->withSubject($subject)->withYear($year);
           
            }//end of main if
            

        return view('results.appendices.appendices')->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withYears($years);
    }

     public function selectAppendicesResult(Request $request)
    {
        //  
      $grades = Grade::all();
      $years = Year::all();
      $depts = Dept::all()->pluck('name','id');
      $semesters = Semester::all();
      $users = User::all();
      $subjects = Subject::all();   
      //insertAppendicesResult
      if ($request->subject) 
        {
             $year = $request->year;
             $dept = $request->dept;
             $semester = $request->semester_id;
             $grade = $request->grade_id;
             $subject = $request->subject;
             
             $results = Result::where('year_id',$year) 
              ->where('dept_id',$dept)
              ->where('grade_id',$grade)
              ->where('semester_id',$semester)
              ->where('subject_id',$subject)
              ->where(function($query) {
                        $query->where('grad', 'like', '%F%')
                              ->orwhere('grad', 'like', '%ABS%') ;
                    })
              ->with(['user' => function ($q) {
                  $q->orderBy('name');
                }])
              ->with('subjects')
              ->get();
              
           return view ('results.appendices.insertAppendicesResult')->withResults($results)->withDept($dept)->withSemester($semester)->withGrade($grade)->withSubject($subject)->withYear($year);
        }//end of main if

      return view ('results.appendices.selectappendicesResult')->withUsers($users)->withDepts($depts)->withSemesters($semesters)->withGrades($grades)->withSubjects($subjects)->withYears($years);
      
    }

    public function updateResult(Request $request)
    {
        //
        //dd($request->all());
        foreach($request->user_id as $index => $user_id) 

       {
          
            
            //dd($user_id);
            $subject_id = $request->subject;
            $dept_id = $request->dept;
            $year_id = $request->year;
            $grade_id = $request->grade[$index];
            $semester_id = $request->semester[$index];
            //$result->user_id = $user_id;
            $mark = $request->mark[$index];

            
            
            if ($mark >= 50 ) {
                $grad = "CF";
                $mark = 50;

            }
            elseif ($mark >= 40 && $mark < 50) {
                $grad = "DF";
            }

            else 
            {
                $grad = "F";
                $mark = $request->mark[$index];
            }
            
             DB::table('results')
                    ->where('user_id', $user_id)
                    ->where('semester_id',$semester_id)
                    ->where('subject_id', $subject_id)
                    ->update([
                         'grad' => $grad,
                         'mark'   =>  $mark
                         
                    ]);

                 // GPA Rule
                 $marksum = Result::select('mark')
                 ->where('semester_id',$semester_id)
                 ->where('user_id',$user_id)->sum('mark');

                 //dd($marksum.'mark:'.$mark);
                 $gba = $marksum / 10;
                 //insert the number of F grad
                 $checkf = Result::where('user_id',$user_id)
                 ->where('semester_id',$semester_id)
                 ->where('grad', 'like', 'F%')
                 ->get()->count();

             DB::table('gpas')
                ->where('user_id', $user_id)
                ->where('semester_id', $semester_id)
                ->update([
                     'mark'   =>   $marksum,
                     'gpa'   =>   $gba,
                     'F' => $checkf
                ]);

                
      }//end for each

       return view ('/home')->with('message','تم ادخال نتيجة الملاحق');
    }

     public function AppendicesOneStudent(Request $request)
    {
       
      $grades = Grade::all();
      $depts = Dept::all();
      $semesters = Semester::all();
      //InsertAppendicesOneStudent
      if ($request->universit_id) 
        {
              $universit_id = $request->universit_id;
              $dept_id = $request->dept;
              $semester_id = $request->semester_id;
             
               $user = User::where('universit_id',$universit_id)->first();
               $user_id = $user['id'];
              
              $results = Result::where('user_id',$user_id)
                 ->where('semester_id',$semester_id)
                 ->where('grad', 'like', 'F%')
                 ->with('subjects','user.dept')
                 ->with('user')
                 ->get();

                 if (!$results->isEmpty()) {
                    foreach($results  as $result) 
                       {
                           $useruniversitid [] = $result->user->universit_id;
                           $username[] = $result->user->name;
                           $userdept[] = $result->user->dept->name;
                           $usersemester = $result->semester->name;
                       }
           
                     $useruniversitids = collect($useruniversitid)->unique();
                     $usernames= collect($username)->unique();
                     $userdepts= collect($userdept)->unique();
                     $usersemesters= collect($usersemester)->unique();
                 }
                 else
                 {
                    $useruniversitids = [];
                     $usernames= [];
                     $userdepts= [];
                     $usersemesters= [];
                 }
                  

              return view ('results.appendices.InsertAppendicesOneStudent')->withResults($results)->withUseruniversitids($useruniversitids)->withUsernames($usernames)->withUserdepts($userdepts)->withUsersemesters($usersemesters);
        }//end of main if
        

      return view ('results.appendices.AppendicesOneStudent')->withDepts($depts)->withSemesters($semesters)->withGrades($grades);
         
   
    }
    
    public function StoreAppendicesOneStudent(Request $request)
    {
        //
        //dd($request->all());

        $user_id = $request->user_id;
        $semester_id = $request->semester_id;

        //dd($user_id);
      foreach($request->subject_id as $index => $subject_id)  

       {
            //dd($user_id.'/'.$subject_id.'/'.$mark);
            $mark = $request->mark[$index];

            if ($mark >= 50 ) {
                $grad = "CF";
                $mark = 50;

            }
            elseif ($mark >= 40 && $mark < 50) {
                $grad = "DF";
                $mark = $request->mark[$index];
            }

            else 
            {
                $grad = "F";
                $mark = $request->mark[$index];
            }

              DB::table('results')
                    ->where('user_id', $user_id)
                    ->where('subject_id', $subject_id)
                    ->update([
                         'grad' => $grad,
                         'mark'   =>  $mark
                         
                    ]);

             $marksum = Result::select('mark')
                 ->where('semester_id',$semester_id)
                 ->where('user_id',$user_id)->sum('mark');
             $gba = $marksum / 10;

             //insert the number of F grad
             $checkf = Result::where('user_id',$user_id)
             ->where('semester_id',$semester_id)
             ->where('grad', 'like', 'F%')
             ->get()->count();

             DB::table('gpas')
                ->where('user_id', $user_id)
                ->where('semester_id', $semester_id)
                ->update([
                     'mark'   =>   $marksum,
                     'gpa'   =>   $gba,
                     'F' => $checkf
                ]);

            
        }//end foreach

      
      $depts = Dept::all();
      $semesters = Semester::all();
        
      // $subjects = Subject::all()->pluck('name','id');

    //  dd($years);

      return view ('results.appendices.AppendicesOneStudent')->withDepts($depts)->withSemesters($semesters)->with('message','تم أضافة النتيجة بنجاح');


    }//end Function

    public function selectAppendicesSubjectsOneStudent(Request $request)
    {
        //
      $depts = Dept::all();
      if ($request->universit_id) 
        {
            $this->validate($request , array(
             'universit_id'=> 'required'
            )); 
        
           $universit_id = $request->universit_id;
           $dept_id = $request->dept_id;
           $user = User::where('universit_id',$universit_id)->first();
           $user_id = $user['id'];
             
             //dd($user['name']);
            $result1s = Result::where('user_id',$user_id)
                     ->where('dept_id',$dept_id)
                     ->where('grad','like' ,'F%')
                     ->with('semester')
                     ->get();

                /*  this code is work fine to get semester name this code is work fine to get semester name
            foreach($result1s as $result)
                {
                   
                    $semester[] = $result->semester->name;
                    
                }  
                dd($semester);
                */
            $result2s = Result::where('user_id',$user_id)
                     ->where('dept_id',$dept_id)
                     ->where('grad','like' ,'ABS%')
                     ->get();
             
                     //dd($result2s);

              return view ('results.appendices.showAppendicesSubjectsOneStudent',compact('result1s'))->withResult2s($result2s)->withUser($user);
       
        }//end of main if
 
      return view ('results.appendices.selectAppendicesSubjectsOneStudent')->withDepts($depts);
 
    }

    public function GetYearStudentResult(Request $request)
    {
        $years = Year::all();
        // ShowYearStudentResult
        if ($request->year_id) 
            {
                $this->validate($request , array(
                 'universit_id'=> 'required',
                 'year_id'=> 'required'
                )); 
            
               $universit_id = $request->universit_id;
               $year_id = $request->year_id;
               $user = User::where('universit_id',$universit_id)->first();
               $user_id = $user['id'];
                //dd($user_id);

                $semesters = semester::with([
                            'results' => function ($query) use ($year_id, $user_id) {
                                $query->where(function ($q) use ($year_id, $user_id) {
                                    $q->where('user_id', $user_id); //This can accept more where() condition
                                })->where('year_id','=',$year_id)->with('grade','subjects','year');
                            }])->whereHas('results')
                        ->get();

                return view ('results.main.ShowYearStudentResult',compact('semesters'))->withUser($user);
            

            }//end of main if

        return view ('results.main.GetYearStudentResult',compact('years'));

    }

    public function EditOneSubjectOneStudent(Request $request)
    {
        //
          
          $depts = Dept::all()->pluck('name','id');
          $subjects = Subject::all(); 
         // Insert One Subject for one Student
          if ($request->subject) 
            {
               $universit_id = $request->universit_id;
               $subject_id = $request->subject;
               $user = User::where('universit_id',$universit_id)->firstOrFail();
               $user_id = $user['id'];
                 

                 $results = Result::where('user_id',$user_id)
                 ->where('subject_id',$subject_id)
                 ->with('subjects','user')
                         ->get();
                

                return view ('results.main.InsertOneSubjectOneStudent',compact('results'));

            }//end of main if

        return view ('results.main.EditOneSubjectOneStudent',compact('depts','semesters'));
    }
    
    public function UpdateOneSubjectOneStudent(Request $request)
    {
        //
      // dd($request->all());
        $user_id = $request->user_id;
        $subject_id = $request->subject_id;
        $semester_id = $request->semester_id;
        $mark = $request->mark;
         
         
         if ($mark == 111 ) {
                $grad = "ABS";
                $mark = 0;

            }
            elseif ($mark == 222 ) {
                $grad = "S";
                $mark = 0;
            }

            elseif ($mark >= 80) {
               $grad = "A";
            }

            elseif ($mark < 80 && $mark >= 70) {
                $grad = "B";
            }
            elseif ($mark < 70 && $mark >= 60) {
                $grad = "C";
            }
            elseif ($mark < 60 && $mark >= 50) {
                $grad = "D";
            }
        
            else 
            {
                $grad = "F";
            }
        $result = Result::where('user_id', $user_id)
        ->where('subject_id', $subject_id)
        ->update(['mark' => $mark,'grad' => $grad]);

    $marksum = Result::select('mark')
         ->where('semester_id',$semester_id)
         ->where('user_id',$user_id)->sum('mark');

         $gba = $marksum / 10;
                 
             
     $check = Gpa::select('mark')
     ->where('user_id',$user_id)     
     ->where('semester_id',$semester_id)
     ->get()->count();

             //dd($check);

     $checkf = Result::where('user_id',$user_id)
     ->where('semester_id',$semester_id)
     ->where(function($query) {
        $query->where('grad', 'like', '%F%')
              ->orwhere('grad', 'like', '%ABS%') ;
       })
     ->get()->count();
                 
        
                 //dd($check);

                 if ($check == 0) 
                 {

                        DB::table('gpas')->insert(
                             array(
                                    'user_id'   =>   $user_id,
                                    'semester_id' => $semester_id,
                                    'mark'   =>   $marksum,
                                    'gpa'   =>   $gba,
                                    'F' => $checkf
                                    
                             )
                        );
                 }
                  else {
                    DB::table('gpas')
                    ->where('user_id', $user_id)
                    ->where('semester_id', $semester_id)
                    ->update([
                         'mark'   =>   $marksum,
                         'gpa'   =>   $gba,
                         'F' => $checkf
                    ]);
                 }

        $depts = Dept::all()->pluck('name','id');
        $subjects = Subject::all(); 

        return view ('results.main.EditOneSubjectOneStudent',compact('depts','semesters'));
    }
    
    public function destroy($id)
    {
        //
    }
}
