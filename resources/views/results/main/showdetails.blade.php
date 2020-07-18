@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  
<div class="col-md-10">
 
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>
   
<div class="row"> 
 
  <div class="col-md-10">

    <table class="table"> 
      <thead>
       
      </thead>
      <tbody>   
            
          <tr>
          @foreach($users as $item )
             <td><strong>اسم الطالب:</strong> {{ $item->name }}</td>

             <td><strong>الرقم الجامعي:</strong> {{ $item->universit_id }}</td>
              
             <td><strong>المعدل:</strong> @foreach($item->gpas as $gpa ) {{ $gpa->gpa}} @endforeach

            </td>

             <td><strong>القسم:</strong> {{ $item->dept->name }}</td>
             
             <tr>
               <td>اسم المادة</td>
               <td>الدرجة</td>
               <td>المعدل</td>
             </tr>
             @foreach ($item->results as $result) 
             <tr> 
                  <td>
                    
                    @foreach ($result->subjects as $subject)
                           {{ $subject->name }}
                    @endforeach
                  </td> 
                  <td>{{$result->mark}}</td>
                  <td>{{$result->grad}}</td> 
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