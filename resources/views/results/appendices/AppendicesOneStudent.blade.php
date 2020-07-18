@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
	<div class="col-md-8 col-md-offset-2">
	   <img src="{{asset('logo-r.png') }}">
	   <div class="alert alert-success" role="alert"> ادخال ملاحق طالب واحد : </div>
   </div>

	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'appendices.AppendicesOneStudent', 'data-parsley-validate' => '','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}
         {{ method_field('get') }}
          {{form::label('')}}
          {{form::number('universit_id',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الطالب الجامعي' )) }}

         <label for="اسم القسم">اسم القسم</label>
         <select class="form-control" name="dept" id="dept" > 
                 <option>اختيار القسم</option>
		        @foreach ($depts as $dept)
		            <option value="{{ $dept->id }}" >{{ $dept->name }}</option>
		        @endforeach
         </select>
         <label for="اسم القسم"> الفصل الدراسي</label>
         <select class="form-control" name="semester_id"> 
		        @foreach ($semesters as $semester)                   
		            <option value="{{ $semester->id }}">{{ $semester->name}}</option>
		        @endforeach
       
         
         {{form::submit('ادخال',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection

