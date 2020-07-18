@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
	 <div class="col-md-8 col-md-offset-2">
		 {!! Form::open(['route' => 'SelectResult', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}
         <select class="form-control" name="dept_id">
		        @foreach ($depts as $dept)
		            <option value="{{ $dept->id }}">{{ $dept->name}}</option>
		        @endforeach
         </select>
         <select class="form-control" name="semester_id"> 
		        @foreach ($semesters as $semester)                   
		            <option value="{{ $semester->id }}">{{ $semester->name}}</option>
		        @endforeach
         </select>
        <select class="form-control" name="grade_id"> 
		        @foreach ($grades as $grade)                   
		            <option value="{{ $grade->id }}">{{ $grade->name}}</option>
		        @endforeach
         </select>
         
         {{form::submit('ادخال',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection
