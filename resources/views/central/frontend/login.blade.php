@extends('central.frontend.layout.app')

@section('css')
<style>
    body {
        font-family: "Lato", sans-serif;
    }
    
    .main-head{
        height: 150px;
        background: #FFF;
        
    }
    
    .sidenav {
        height: 100%;
        background-color: #000;
        overflow-x: hidden;
        padding-top: 20px;
    }
    
    
    .main {
        padding: 0px 10px;
    }
    
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }
    
    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 10%;
        }
        
        .register-form{
            margin-top: 10%;
        }
    }
    
    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%; 
        }
        
        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }
        
        .login-form{
            margin-top: 80%;
        }
        
        .register-form{
            margin-top: 20%;
        }
    }
    
    
    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }
    
    .login-main-text h2{
        font-weight: 300;
    }
    
    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }
</style>
@endsection


@section('content')
<div class="col-md-12">
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Ezisafer<br> Admin Login Page</h2>
            <p>Login from here to access admin dashboard.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                {{-- <form method="post" action="{{route('admin.login.post')}}"> --}}
                <form action='{{url('admin/login')}}' method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                        @error('email')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                        @if(session('error'))
                        <p class="help-block" style="color: red;">{{session('error')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection