@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
  <div class="col-md-8 col-md-offset-2">
     <img src="{{asset('logo-r.png') }}">
     <div class="alert alert-success" role="alert"> نقل الطلاب الى المستوى التالي : </div>
  </div>
	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'transform', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
    @method('POST')
         {{csrf_field()}} 
         <select class="form-control" name="dept_id">
             <option value=''> اختيار القسم</option>
              @foreach($depts as $dept)
                 <option value='{{ $dept->id}}'> {{ $dept->name}}</option>
              @endforeach
         </select>  
         {{form::submit('عرض',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection
@section('scripts')

{!! Html::script('js/bootstrap-datepicker.js') !!}

 @endsection
