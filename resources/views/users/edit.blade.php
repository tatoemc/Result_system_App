@extends('main')

@section('title','|تعديل')
@section('stylesheets')
{!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection

@section('content')
<div class="row"> 
	<!-- to array here !--> 
	 
	 <div class="col-md-7">
	 	{!! Form::model($user, ['route'=>['users.update',$user->id] ,'method' => 'PUT', 'files' => 'ture','class'=>'dates']) !!}

	 	{{form::label('name', 'الاسم رباعي :')}}
		{{ form::text('name', null , ["class"=>'form-control input-lg' ]) }}

		{{form::label('dept_id', 'القسم:')}}
		<select class="form-control" name="dept_id">
			@foreach($depts as $dept) 
             <option value='{{ $dept->id}}'{{$dept->id == $user->dept_id ? 'selected' : '' }}> {{ $dept->name}}</option>
        	@endforeach
        </select>
        
		{{form::label('email', 'البريد الالكتروني :')}} 
		{{ form::text('email', null,["class"=>'form-control' ]) }}


        {{form::label('gender', 'النوع :')}}
		<select class="form-control" name="gender">
         <option value='ذكر'{{ $user->gender == 'ذكر' ? 'selected' : ''}}> ذكر </option>   
         <option value='انثى'{{ $user->gender == 'انثى' ? 'selected' : ''}}> انثى </option> 	
         </select>
          
 
		{{form::label('images', 'تحديث صورة الطالب:'),['class'=>'form-spacing-top' ] }}
		{{form::file('images') }}
		
	</div>
	<div class="col-md-5">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($user->created_at)) }} </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($user->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('users.show','الغاء',array($user->id),array('class'=>'btn btn-danger btn-block')) }}
                   
				</div>
				<div class="col-sm-6">
                      {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}
				</div><!-- end form !-->
                 
			</div>
		</div>
	</div>

{!! Form::close() !!}
</div> <!-- end the form !-->

@endsection
@section('scripts')

{!! Html::script('js/bootstrap-datepicker.js') !!}

<script type="text/javascript">
 

  $(function() {
            $('.dates #u1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
</script>

 @endsection

