@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
   <div class="alert alert-success" role="alert"> ادخال الدرجات : </div>
</div>
	
<div class="col-md-5">

</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>
  
<div class="row"> 
	<div class="col-md-6 col-md-offset-2">
    
		<table class="table" border="1">
			{!! Form::open(['route' => 'results.store', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
			{{csrf_field()}}
			 
				<th >الرقم الجامعي</th>
				<th >اسم الطالب</th>
				<th >الدرجة</th>
			
			 @foreach($users as $user) 
			<tr>
				<td width="70"> {{$user->universit_id}}- </td>
				<td width="100"> {{$user->name}} </td>
				<td width="10">
	
					<div class="form-group">
				   	<input type="hidden" value="{{$subject}}" name="subject"/>
				   	<input type="hidden" value="{{$dept}}" name="dept"/>
				   	<input type="hidden" value="{{$year}}" name="year"/>
				   	 <input type="hidden" value="{{$grade}}" name="grade[]"/>
				   	 <input type="hidden" value="{{$semester}}" name="semester[]"/>
					 <input type="hidden" value="{{$user->id}}" name="user_id[]"/>
		             <input type="number" class="form-control" name="mark[]" required >
					</div>
				</td> 
			</tr>
			 @endforeach 
		</table>
		        <div class="col-sm-6">
                      {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}
				</div><!-- end form !-->
	{!! Form::close() !!}

		<div class="text-center">

		</div>
	</div>
</div>


@stop