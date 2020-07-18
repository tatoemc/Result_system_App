@extends('main')

@section('title','| انشاء رسالة')

@section('stylesheets')
{!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection
 
@section('content')

<div class="row"> 
	  <div class="col-md-8 col-md-offset-2">
		   <img src="{{asset('logo-r.png') }}">
		   <div class="alert alert-success" role="alert"> ادخال طلاب السنة الجديدة : </div>
	  </div>
	     <div class="col-md-10 col-md-offset-1">
	     	 {!! Form::open(['route' => 'users.store', 'data-parsley-validate' => '', 'files' => 'ture','class'=>'dates' ]) !!}
		     	  {{form::label('dept_id', 'القسم:')}}
						<select class="form-control" name="dept_id">
							@foreach($depts as $dept)
	                         <option value='{{ $dept->id}}'> {{ $dept->name}}</option>
	                    	@endforeach
	                    </select> 
	     
			<table>
				@for ($i = 0 ; $i <= 1; $i++)
				<tr>

					<td>
						{{form::label('')}}
					    {{form::text('name[]',null,array('class' => 'form-control','required' => '','placeholder'=>'الاسم' )) }} 
 
					</td>
					<td>
						{{form::label('')}}
					    {{form::number('universit_id[]',null,array('class' => 'form-control','required' => '','placeholder'=>'الرقم الجامعي' )) }} 
 
					</td>

					<td>
						{{form::label(' ')}}
							{{form::text('email[]',null,array('class' => 'form-control','required' => '','placeholder'=>'البريد الالكتروني' )) }}
					</td>
					<td>
						{{form::label('gender', 'النوع :')}}
							<select class="form-control" name="gender[]">
		                          <option value='ذكر'> انثى </option>
		                          <option value='ذكر'> ذكر </option>        	
		                    </select>
					</td>
                    
					
			    </tr>
			    @endfor
			</table>
			<div class="col-md-2">
			{{form::submit('أضافة',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}
			</div>

					{!! Form::close() !!}
		</div>
</div>

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
