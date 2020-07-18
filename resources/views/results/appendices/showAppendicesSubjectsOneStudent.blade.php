@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
   
<div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
</div>

<div class="col-md-6 col-md-offset-2">
  <table class="table">
    <thead>
      <th>الاسم :{{$user['name']}}</th>
      <th>الرقم الجامعي :{{$user['universit_id']}}</th>
      <th>القسم :{{$user->dept->name}}</th>
      <th></th>
    </thead>
  </table>

</div>
 
</div>
   
<div class="row"> 
 
  <div class="col-md-8 col-md-offset-2">
    
    <table class="table" border="1"> 
      <thead>
        
      </thead>
      <tbody>   
          
          @foreach($result1s as $result )
                <tr>
               @foreach ($result->subjects as $subject)
                       <td>{{ $subject->name }}</td>
                 </tr> 
                 @endforeach        
          @endforeach

          @foreach($result2s as $result )
                <tr>
               @foreach ($result->subjects as $subject)
                       <td>{{ $subject->name }}</td>
                 </tr> 
                 @endforeach        
          @endforeach

      </tbody>
    </table>
    
    <div class="text-center">
     
    </div>

  </div>
</div>
@stop