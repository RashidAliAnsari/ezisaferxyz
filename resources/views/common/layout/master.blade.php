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
    @include('common.layout.head')
    @livewireStyles

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyCi21EKu0cwQuB3BiGzUvwWmCXwJ6kt6gQ&libraries=places"></script>

</head>

<body
    class="app sidebar-mini {{ Auth::user()->is_dark_mode ? 'dark-mode dark-sidebar' : 'light-mode light-sidebar' }}">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <!---Global-loader-->
    {{-- <div id="global-loader" >
			<img src="{{URL::asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div> --}}

    <div class="page">
        <div class="page-main">
            {{-- @include('common.layouts.side-menu') --}}
            @yield('side-menu')
            <div class="app-content main-content">
                <div class="side-app">
                    @include('common.layout.header')
                    @yield('page-header')
                    {{-- @yield('content') --}}
                    {{ $slot }}
                    @include('common.layout.footer')
                </div><!-- End Page -->
                @include('common.layout.footer-scripts')

</body>

</html>
