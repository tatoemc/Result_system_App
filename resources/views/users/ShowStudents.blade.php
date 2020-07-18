@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   <div class="alert alert-success" role="alert">
      قائمة الطلاب :
  </div>
</div>
  
<div class="col-md-10">
   <table class="table"> 
      <tr>
         <td><strong>اسم القسم:</strong> {{ $dept->name }}</td>
         <td><strong>الفصل الدراسي:</strong> {{ $semester->name }}</td>
         <td><strong>المستوى:</strong> {{ $grade->name }}</td>
         <td><strong>اسم المادة:</strong> {{ $subject->name }}</td>
      </tr>
      <tr>
    </table>
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>
   
<div class="row"> 
 
  <div class="col-md-10">
     
    <table class="table" border="1"> 
      <thead>
    
             
      </thead>
      <tbody> 
            <tr>  
               <td width="100">الرقم الجامعي</td>
               <td width="300">اسم الطالب</td>
               <td width="100">التوقيع</td>
               <td width="100">أعمال السنة</td>
               <td width="100">درجة الامتحان</td>
               <td>ملاحظات</td>
             </tr>
             <tr> 
             @foreach ($users as $user)
                  <td >{{$user->universit_id}}</td> 
                  <td >{{$user->name}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>    
             @endforeach
         
         
      </tbody>
    </table>
    
    <div class="text-center">
     
    </div>

  </div>
</div>
@stop