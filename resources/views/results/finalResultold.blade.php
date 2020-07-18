@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  
<div class="col-md-10">
 <table class="table"> <strong></strong>
      <tr>
         <td><strong>القسم</strong> {{$deptname[0]}}</td>
         <td><strong>المستوى</strong> {{$gradename[0]}}</td>
         <td><strong>الفصل الدراسي</strong> {{$semestername[0]}}</td>
         <td><strong>العام الدراسي</strong> {{$yearname[0]}}</td>
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

    <table class="table"> 
      <thead>  
        <tr>
          <td>الرقم الجامعي</td>
          <td>الاسم</td>
          <td>المعدل</td>
          <td>القرار</td>
       @foreach($subjects as $subject )
          <td>{{$subject}}</td>
                       
         @endforeach

         
      </tr>
        
      </thead>
      <tbody>  
        
          @foreach($users as $item )
             <td>{{ $item->universit_id }}</td>
             <td>{{ $item->name }}</td>
             <td>
              
             @foreach($item->gpas as $gpa )
                    {{ $gpa->gpa}}
             @endforeach
            </td>
            <td>
              @foreach($item->gpas as $gpa )
                    
              {{$gpa->F == 0 ? 'نجاح' : $gpa->F.' -رسوب'}}
             @endforeach
            </td>
             @foreach ($item->results as $result) 
                  <td>{{$result->grad}}</td> 
                   
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