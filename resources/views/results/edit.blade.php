@extends('main')

@section('title','|تعديل')

@section('content')
<div class="row"> 
	<!-- to array here !--> 
	 
	 <div class="col-md-7">
	 	{!! Form::model($dept, ['route'=>['depts.update',$dept->id] ,'method' => 'PUT', 'files' => 'ture']) !!}

	 	{{form::label('name', 'الاسم رباعي :')}}
		{{ form::text('name', null , ["class"=>'form-control input-lg' ]) }}
		
	</div>
	<div class="col-md-5">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($dept->created_at)) }} </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($dept->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('depts.show','الغاء',array($dept->id),array('class'=>'btn btn-danger btn-block')) }}
                   
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

