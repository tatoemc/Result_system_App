@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('users.create')}} " class="btn btn-lg btn-block btn-primary">انشاء مستخدم جديد</a>
</div>
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
				<th>الوظيفة</th>
				<th>الدرجة الوظيفية</th>
				<th>المؤهل</th>
				<th>تاريخ التعين</th>
				<th>تاريخ الميلاد</th>
				<th>رقم الهاتف</th>
				<th>البريد الالكتروني</th>
				<th></th>
 
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr> 
					
					<td>{{$user->name}}</td>
					<td>{{$user->dept->name}}</td>
					<td>{{$user->job->name}}</td>
					<td>{{$user->degree->name}}</td>
					<td>{{$user->qualification}}</td>
					<td>{{ date('M j,Y', strtotime($user->created_at)) }}</td>
					<td>{{$user->Bdate}}</td>
					<td>{{$user->phone}}</td>
					<td>{{$user->email}}</td>
					

					<td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			
		</div>
	</div>
</div>


@stop