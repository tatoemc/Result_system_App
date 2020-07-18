@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   <div class="alert alert-success" role="alert">نتيجة فصل دراسي واحد : </div>
  </div>
<div class="col-md-10">
 
</div>
<div class="col-md-8 col-md-offset-2">
  @foreach($users as $item )
    <table class="table">
             <td><strong>اسم الطالب:</strong> {{ $item->name }}</td>

             <td><strong>الرقم الجامعي:</strong> {{ $item->universit_id }}</td>
              
             <td><strong>المعدل:</strong> @foreach($item->gpas as $gpa ) {{ $gpa->gpa}} @endforeach

            </td>

             <td><strong>القسم:</strong> {{ $item->dept->name }}</td>
             
             <tr>
      </table>
    @endforeach

</div>
</div>
   
<div class="row"> 
 
  <div class="col-md-8 col-md-offset-2" >

    <table class="table" border="2"> 
      <thead>
        <th >اسم المادة</th>
        <th >الدرجة</th>
        <th >التقدير</th>
      </thead>
      <tbody>   
          @foreach($users as $item )
             @foreach ($item->results as $result) 
             <tr> 
                  <td > 
                    @foreach ($result->subjects as $subject)
                           {{ $subject->name }}
                    @endforeach
                  </td> 
                  <td >{{$result->mark}}</td>
                  <td >{{$result->grad}}</td> 
               </tr>    
             @endforeach
            </tr>
            @endforeach   
         
      </tbody>
    </table>
    
    <div class="text-center">
     
    </div>

  </div>
</div>
@stop