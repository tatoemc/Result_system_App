@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  	<div class="col-md-8 col-md-offset-2">
     <img src="{{asset('logo-r.png') }}">
     <div class="alert alert-success" role="alert"> ادخال ملاحق طالب واحد : </div>
    </div>
<div class="col-md-8 col-md-offset-2">
  <table class="table" border="2">
           <thead>
      @foreach($usernames as $username )
            <th>اسم الطالب : {{$username}}</th>
                         
           @endforeach
           @foreach($useruniversitids as $useruniversitid )
            <th>الرقم الجامعي : {{$useruniversitid}}</th>
                         
           @endforeach
           @foreach($userdepts as $userdept )
            <th>اسم القسم : {{$userdept}}</th>
                         
           @endforeach
         
           @foreach($usersemesters as $usersemester )
            <th>الفصل الدراسي : {{$usersemester}}</th>
                         
           @endforeach

            </thead>
        </table>
      </div>
</div>

<div class="row"> 
	<div class="col-md-8 col-md-offset-2">
        
		<table class="table" border="2">
			{!! Form::open(['route' => 'appendices.StoreAppendicesOneStudent', 'data-parsley-validate' => '','method'=>'HEAD','enctype'=>'multipart/form-data' ]) !!}
			{{csrf_field()}}
          
		@foreach($results  as $result)
		    <tr>
		    	<div class="form-group" class="form-control">
		    	<input type="hidden" value="{{$result->user->id}}" name="user_id"/>
		    	<input type="hidden" value="{{$result->semester->id}}" name="semester_id"/>
            @foreach($result->subjects  as $subject)
                  <td>{{ $subject->name}}</td>
                  <td>                
				   	<input type="hidden" value="{{$subject->id}}" name="subject_id[]"/>
		             <input type="number" class="form-control" name="mark[]" >
					</div>
                  </td>
            @endforeach
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