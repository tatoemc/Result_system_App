@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  
<div class="col-md-10">
    <div class="col-md-8 col-md-offset-2">
     <img src="{{asset('logo-r.png') }}">
     
  <table class="table">
     <thead>
       <th> الاسم :{{$user['name']}}</th>
       <th> الرقم الجامعي : {{$user['universit_id']}}</th>
       <th> القسم :{{$user->dept->name}}</th>
     </thead>
  </table>
</div>
</div>
</div>
   
<div class="row"> 
  
  <div class="col-md-6 col-md-offset-2">
    
    <table class="table" border="1"> 
      <tbody> 
       <tr > 
        
        @foreach($semesters as $semester )
              <tr>

              <td  colspan="3">{{$semester->results->first()->grade->name}} - {{$semester->name}} - {{$semester->results->first()->year->year}}</td>
             
              @foreach($semester->results as $result )
              </tr>
                       <td >{{$result->subjects->first()->name}}</td>
                       <td>{{$result->mark}}</td>
                       <td>{{$result->grad}}</td>
              @endforeach
           <tr>
        @endforeach

         
          
          
      </tbody>
    </table>
    
    <div class="text-center">
     
    </div>

  </div>
</div>
@stop