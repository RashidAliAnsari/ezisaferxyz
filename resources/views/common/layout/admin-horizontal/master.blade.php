<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		{{-- <meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/> --}}
		<title>Ezisafer</title>
		@include('common.layout.admin-horizontal.head')
	</head>

	<body class="{{Auth::user()->is_dark_mode ? 'dark-mode' : 'light-mode'}}">
		@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{URL::asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				@include('common.layout.admin-horizontal.header')
				@include('common.layout.admin-horizontal.horizontal-menu')                				
				<div class="app-content page-body">
					<div class="container">
						@yield('page-header')
						@yield('content')
            			@include('common.layout.admin-horizontal.footer')
		</div><!-- End Page -->
			@include('common.layout.admin-horizontal.footer-scripts')	
	</body>
</html>