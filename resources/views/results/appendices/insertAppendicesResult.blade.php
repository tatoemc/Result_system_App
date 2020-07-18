@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	   <img src="{{asset('logo-r.png') }}">
	   <div class="alert alert-success" role="alert"> ادخال نتيجة الملحق : </div>
    </div>

</div>

<div class="row"> 
	<div class="col-md-8 col-md-offset-2">
          
		<table class="table" border="2">
			{!! Form::open(['route' => 'appendices.updateResult', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
			{{csrf_field()}}
            <thead>
            	<th>الرقم الجامعي</th>
            	<th>اسم الطالب</th>
            	<th>النتيجة</th>
            </thead>
	     @foreach ($results as $result)
			<tr>
				<td> {{$result->user->universit_id}}- </td>
				<td> {{$result->user->name}}- </td>
				<td>
	
					<div class="form-group">
				   	<input type="hidden" value="{{$subject}}" name="subject"/>
				   	<input type="hidden" value="{{$dept}}" name="dept"/>
				   	<input type="hidden" value="{{$year}}" name="year"/>
				   	 <input type="hidden" value="{{$grade}}" name="grade[]"/>
				   	 <input type="hidden" value="{{$semester}}" name="semester[]"/>
					 <input type="hidden" value="{{$result->user->id}}" name="user_id[]"/>
		             <input type="number" class="form-control" name="mark[]" >
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