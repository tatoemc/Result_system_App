<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use App\Latter;
use App\User; 
use App\Lattertype; 
use App\Committee;
use App\Committeemember;
use Auth;
use validate; 
use Session; 
use Purifier;
use Storage;
use File;




class LatterController extends Controller
{ 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        //create variable and store the message in it
       // if (Auth::check()) {
           $latters = Latter::where('reciver_id', Auth::user()->id)->get();
            //return view and pass in the variable

            return view ('latters.index')->withLatters($latters);
       // }
       // return view('home');
        
    }

    public function outbox()
    { 
       
           $latters = Latter::where('sender', Auth::user()->id)->get();
            //return view and pass in the variable
            return view ('latters.outbox')->withLatters($latters);
        
    }
    
    /**pagination
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      $lattertypes = Lattertype::all();
      $users = User::all();
      return view('latters.create')->withLattertypes($lattertypes)->withUsers($users); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request , array(
         'type'=> 'required',
         'title' => 'required',
         'body' => 'required'
        ));
        //2
        //dd($request->all());
        if($request->hasfile('file'))
             {

                foreach($request->file('file') as $file)
                {
                    $name=$file->getClientOriginalName();
                    $file->move(public_path().'/images/uploads/', $name);  
                    $data[] = $name;
                } 
                     
             }
             $file= new File();
             //$file->file=json_encode($data);
              
        
        foreach($request->users as $user){
        $latter = new Latter;
        $latter->type = $request->type;
        $latter->reciver_id = $user;
        $latter->user_id = Auth::user()->id;
        $latter->sender = Auth::user()->id;
        $latter->dept_id = Auth::user()->dept_id;
        $latter->title = $request->title;
        $latter->body = Purifier::clean($request->body);
        $latter->filename =$name; 
        //
        
         //    

        $latter->save(); 
        }

        $latter->users()->sync($request->users, false);
        //Session::flash('success','تم الحفظ بنجاح');

        //3

        //dd($request->all());

        return redirect()->route('latters.show', $latter->id);

       
    }

    public function download($file_name)
    {
        $file_path = public_path('images/uploads/'.$file_name);
        return response()->download($file_path);
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     $latters = Latter::find($id);
     //dd($latters);
     $name= $latters->users()->pluck('name');
     //$sender  = User::where('id', $latters->sender)->first();

     if ($latters->sender != Auth::user()->id ) 
         {
             $latters = Latter::where('id', $id)->update(['status' => 1]);
         }
     
 
     $latter = Latter::find($id);

     $committeemembers= Committeemember::where('user_id', $latter->user_id)->get();
     if($committeemembers->isEmpty() )
    {
     
        $committeemembers = "x";
        $committees = "x"; 
    }

    else
    {
        foreach($committeemembers as $committeemember)
         {
                $committeemember->commit_id ;
                if (is_null($committeemember->commit_id) )
                {
                    
                } 
                else 
                {
                    $committees= Committee::where('id',$committeemember->commit_id)->get();
                }
                
               
         }
     
     }
     //dd($sender);
     return view('latters.show')->withLatter($latter)->withCommitteemembers($committeemembers)->withCommittees($committees)->withName($name);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the leatter in the DB and save as variable

         $latter = Latter::find($id);
         $lattertypes = Lattertype::all();
         $lt = array();
         foreach ($lattertypes as $lattertype) {
             $lt[$lattertype->id] = $lattertype->name;
         }

         $users = User::all();
         $users2 = array();
         foreach ($users as $user ) {
             $users2[$user->id] = $user->name;
         }
         //return the view ans pass in the variable

        return view('latters.edit')->withLatter($latter)->withLattertypes($lt)->withUsers($users2);

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
        //validate the data
        $this->validate($request , array(
         'type'=> 'required',
         'title' => 'required',
         'body' => 'required',
         'users' =>'required'
        ));

        //save the data to the data base 
        $latter = Latter::find($id);
        $latter->type = $request->input('type');
        $latter->user_id = Auth::user()->id;
        $latter->title = $request->input('title');
        $latter->body = Purifier::clean($request->input('body'));

        $latter->save();
        $latter->users()->sync($request->users);
        //set flash with success message
        Session::flash('success','تم الحفظ بنجاح');
        //redirect with flash data to  posts.show
        return redirect()->route('latters.show', $latter->id);
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
        $latter = Latter::find($id);
        $latter->delete();
        Session::flash('success','تم حذف الخطاب بنجاح');
        return redirect()->route('latters.index');
    }
    
    
}
