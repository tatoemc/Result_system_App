@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('results.create')}} " class="btn btn-lg btn-block btn-primary">انشاء مستخدم جديد</a>
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">

		<table>
			{!! Form::open(['route' => 'results.store', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
			{{csrf_field()}}
			 @foreach($users as $user) 
			<tr>
				<td> {{$user->id}}- </td>
				<td> {{$user->name}} </td>
				<td>
					<div class="form-group">
					 <input type="hidden" value="{{$user->id}}" name="user_id[]"/>
		             <input type="text" class="form-control" name="subject[]" >
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
			{!! $users->links();  !!}
		</div>
	</div>
</div>


@stop