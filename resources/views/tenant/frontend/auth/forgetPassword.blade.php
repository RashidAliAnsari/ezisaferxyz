@extends('common.layout.admin-horizontal.master-login-register')

@section('css')
@endsection
@section('content')
<body class="h-100vh page-style1 dark-mode">
    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4 page-content">
                                        <div class="card-body page-single-content">
                                            <div class="w-100">
                                                <h1 class="mb-2">Forgot Password</h1>
                                                <p class="text-muted">Forgot Password Page</p>
                                                <div class="btn-list d-flex">
                                                    <a href="https://www.google.com/gmail/" class="btn btn-google btn-block"><i class="fa fa-google fa-1x mr-2"></i> Google</a>
                                                    <a href="https://twitter.com/" class="btn btn-twitter"><i class="fa fa-twitter fa-1x"></i></a>
                                                    <a href="https://www.facebook.com/" class="btn btn-facebook"><i class="fa fa-facebook fa-1x"></i></a>
                                                </div>
                                                <hr class="divider my-6">
                                                <form action="{{ route('forget.password.post') }}" method="POST">
                                                    @csrf
                                                    @error('email')
                                                    <p class="help-block" style="color: red;margin-bottom:2px;">{{$message}}</p>
                                                    @enderror
                                                    <div class="input-group mb-4">
                                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg></span>
                                                        <input type="text" name="email" class="form-control" placeholder="Enetr Email">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="send" class="btn btn-lg btn-primary btn-block px-4"><i class="fe fe-arrow-right"></i> Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                        <div class="card-body text-center justify-content-center page-single-content">
                                            <img src="{{URL::asset('assets/images/pattern/login.png')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-4">
                                    {{-- <div class="font-weight-normal fs-16">Forget it <a class="btn-link font-weight-normal" href="#">Send me back</a></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    @endsection