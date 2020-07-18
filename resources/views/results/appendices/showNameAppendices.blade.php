@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  
<div class="col-md-10 ">
   <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   </div>
</div>
<div class="col-md-10 col-md-offset-2">
  <table> 
    <tr>
         <td><strong>اسم القسم :</strong> {{$dept[0]}}</td>
         <td><strong>المادة :</strong> {{$subject[0]}}</td>
         <td><strong>المستوى :</strong> {{$grade[0]}}</td>
         <td><strong>الفصل الدراسي :</strong> {{$semester[0]}}</td>
         <td><strong>العام الدراسي :</strong> {{$year[0]}}</td>
     
      </tr>
  </table> 
</div>
<div class="col-md-12">
<hr>
</div>
</div>
   
<div class="row"> 
 
  <div class="col-md-8 col-md-offset-2">

    <table class="table" border="2"> 
      <thead>
      </thead>
      <tbody>        
        <tr>
          <td width="100">الرقم الجامعي</td>
          <td>اسم الطالب</td>
          <td>التوقيع</td>
          <td>الدرجة</td>
          <td>ملاحظات</td>
          
        </tr>
         <tr>
             @foreach ($results as $result) 
                 <td> {{$result->user->universit_id}}</td>
                 <td>{{$result->user->name}}</td>
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