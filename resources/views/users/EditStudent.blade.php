@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				
				<th>الاسم</th>
                <th>القسم</th>
				<th>المستوى</th>
				<th>الفصل الدراسي</th>
				<th>تاريخ الانضمام</th>
				<th>البريد الالكتروني</th>
				<th></th>
 
			</thead>
			<tbody> 
				@foreach($users as $user)
				<tr>  
					
					<td>{{$user->name}}</td>
					<td>{{$user->dept->name}}</td>
					<td>{{$user->grade->name}}</td>
					<td>{{$user->semester->name}}</td> 
					<td>{{ date('M j,Y', strtotime($user->created_at)) }}</td>
					<td>{{$user->email}}</td> 
					

					<td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		

		<div class="text-center">
			{!! $users->links();  !!}
		</div>
	</div>
</div>


@stop