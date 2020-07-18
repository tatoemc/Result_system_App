@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
  <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   <div class="alert alert-success" role="alert"> ادخال نتيجة طالب لمادة واحدة : </div>


<table class="table">

	<tr>
	@foreach($results as $result )
	 
            <td><strong>المادة :</strong>{{$result->subjects->first()->name}}</td>
            <td><strong>اسم الطالب :</strong>{{$result->user->name}}</td>
            <td><strong>الرقم الجامعي :</strong>{{$result->user->universit_id}}</td>
            <td><strong>القسم :</strong>{{$result->user->dept->name}}</td> 
            </tr>              
 @endforeach
</table>
</div>
	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'result.UpdateOneSubjectOneStudent', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}
         {{form::label('')}}
         @foreach($results as $result )
           
	       <input type="hidden" value="{{$result->user->id}}" name="user_id"/>
	       <input type="hidden" value="{{$result->subjects->first()->id}}" name="subject_id"/>
	       <input type="hidden" value="{{$result->semester_id}}" name="semester_id"/>
          {{form::text('mark',$result->mark,array('class' => 'form-control','required' => '','placeholder'=>'الرقم الجامعي' )) }}
         @endforeach
         {{form::submit('ادخال',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection