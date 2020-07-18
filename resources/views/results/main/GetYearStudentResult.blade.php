@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   <div class="alert alert-success" role="alert"> تفاصيل عام دراسي : </div>
 </div>
   
<div class="row"> 
 
  <div class="col-md-8 col-md-offset-2">

     {!! Form::open(['route' => 'result.GetYearStudentResult', 'data-parsley-validate' => '','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}
         {{ method_field('get') }}
         {{form::label('')}}
          {{form::number('universit_id',null,array('class' => 'form-control','required' => '','placeholder'=>'الرقم الجامعي' )) }}

         <label for="اسم القسم">اسم القسم</label>
         <select class="form-control" name="year_id" id="year_id" > 
                 <option> اختيار العام الدراسي </option>
            @foreach ($years as $year)
                <option value="{{ $year->id }}" >{{ $year->year }}</option>
            @endforeach
         </select>
        
         {{form::submit('عرض',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

     {!! Form::close() !!}



  </div>
</div>
@stop