@extends('main')

@section('title','| انشاء رسالة')

@section('content') 

<div class="row"> 
	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'result.getdetails', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}

         {{form::label('')}}
          {{form::text('universit_id',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الطالب' )) }}

         <label for="اسم القسم"> الفصل الدراسي</label>
         <select class="form-control" name="dept_id">
            <option value="">اختيار القسم</option> 
		        @foreach ($depts as $dept)                   
		            <option value="{{ $dept->id }}">{{ $dept->name}}</option>
		        @endforeach
         </select>
          
         {{form::submit('تفاصيل',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

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
