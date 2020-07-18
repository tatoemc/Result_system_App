@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'EditStudent', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
    @method('POST')
         {{csrf_field()}} 

         <select class="form-control" name="dept_id">
             <option value=''> اختيار القسم</option>
              @foreach($depts as $dept)
                 <option value='{{ $dept->id}}'> {{ $dept->name}}</option>
              @endforeach
         </select>

         <select class="form-control" name="semester_id">
             <option value=''> اختيار الفصل</option>
              @foreach($semesters as $semester)
                 <option value='{{ $semester->id}}'> {{ $semester->name}}</option>
              @endforeach
         </select> 
         
         {{form::submit('عرض',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')

	<script>
	 
	$(document).ready(function(){

	      $('select[name="dept"]').on('change',function(){

          var dept_id = $(this).val();
          
          if(dept_id) {

          	$.ajax({
          		url:'/getdepts/'+dept_id,
          		type: 'GET',
          		dataType: 'json',
          		success: function(data){
          			console.log(data);
          			$('select[name="subject"]').empty();
          			$.each(data,function(key,value){
          				$('select[name="subject"]')
          				.append('<option value="'+key+'">'+ value + '</option>');
          			});
          		}

          	});

          } else{
          	$('select[name="subject"]').empty();
          }

	      });
		});
	</script>

 @endsection
