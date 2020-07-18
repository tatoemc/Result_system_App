<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
	
	<meta charset="utf-8" />
        <title>نظام النتيجة | كلية الامارات للعلوم و التكنولوجيا</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
 <meta name="csrf-token" content="{{ csrf_token()}}">
 @include('partials._header')
 @yield('stylesheets')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" >
@include('partials._nav')
<div class="page-container"> 

	@include('partials._sidebar')
<div id="app" class="page-content-wrapper">

	<div class="page-content" style="min-height:1015px">  
        	@if(session()->has('message'))
		     <div class="alert alert-success" role="alert">
		     	<strong>نجاح</strong> {{ session()->get('message')}}
		     </div>
		    @endif
		@yield('content')

 
	</div><!-- end page-content --> 
</div> <!-- end page-content-wrapper -->

<div class="page-quick-sidebar-toggler" data-close-on-body-click="false">

	<div class="page-quick-sidebar">
		
	</div><!-- end page-quick-sidebar -->
	
</div><!-- end page-quick-sidebar-toggler -->

</div><!-- end page-container -->
@include('partials._footer')
@include('partials._java')

@yield('scripts')
</body>
</html>