@extends('main')

@section('title','|عرض')

@section('content')
<div class="row">
	 <div class="col-md-8">
		
	<div class="portlet-body">
      <div class="table-responsive">
		    <table class="table table-bordered">
		        <thead >
		            
		        </thead>
		        <tbody> 
		        	<tr>
		                 <p> <td > رقم المستخدم</td></p>
		                <td >{{ $user->id }}</td> 
		                <td colspan="2" > <img src="{{ asset('images/' . $user->images )}}" class="rounded"> </td>	                 
		            </tr>	        
		            <tr>
		                <td > الاسم </td>
		                <td >{{ $user->name}}</td>  
		            </tr>
		            <tr>
		               <td > رقم الهاتف</td>
		                <td >{{ $user->gender }}</td> 
		            </tr>
		            <tr>
		               <td > القسم</td>
		                <td >{{ $user->dept->name }}</td> 
		            </tr>
		            <tr>
		               <td > الوظيفة</td>
		                <td >{{ $user->job->name }}</td> 
		            </tr>
		            <tr>
		               <td > الدرجة الوظيفية</td>
		                <td >{{ $user->degree->name }}</td> 
		            </tr>
		            <tr>
		                <td > تاريخ الميلاد </td>
		                <td >{{ date('M j,Y', strtotime($user->Bdate)) }}</td> 		              
		            </tr>
		            <tr>
		                <td > تاريخ التعين </td>
		                <td >{{ date('M j,Y', strtotime($user->created_at)) }}</td> 		              
		            </tr>
		            <tr>
		               <td > البريد الالكتروني </td>
		                <td >{{ $user->email }} </td> 
		            </tr>
		            <tr>
		               <td > رقم الهاتف</td>
		                <td >{{ $user->phone }} - {{ $user->phone2 }}</td> 
		            </tr>
		            <tr>
		               <td > السكن</td>
		                <td >{{ $user->state }} - {{ $user->city }} - {{ $user->unit }} - منزل رقم{{ $user->home_no }}</td> 
		            </tr>
		            
		            <tr>
		               <td > نوع اثبات الشخصية</td>
		                <td >{{ $user->snb_type }}</td> 
		            </tr>
		             <tr>
		               <td > اثبات الشخصية</td>
		                <td >{{ $user->snb }}</td> 
		            </tr>
		            
		            
		        </tbody>
		    </table>
		
	</div>
	<div class="col-md-4">
		<div class="well">
			
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('users.edit','تعديل',array($user->id),array('class'=>'btn btn-primary btn-block')) }}
					
                   
				</div>
				<div class="col-sm-6">
                      <!-- here is tow array !-->
					{!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE' ] ) !!}
          
                      {!! Form::submit('حذف', ['class'=> 'btn btn-danger btn-block' ]) !!}
                      {!! Form::close() !!}
					
				</div>
				
			</div>
		</div>
	</div>
</div>


@endsection