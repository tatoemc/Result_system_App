@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
</div>
  
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
 
  <div class="col-md-11">

    <table class="table" border="2"> 
      <thead>  
        
          <th width="100">الرقم الجامعي</th>
          <th width="200">الاسم</th>
          <th width="200">المعدل</th>
          <th width="70">القرار</th>
       @foreach($subjects as $subject )
          <th width="70">{{$subject}}</th>
                       
         @endforeach

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