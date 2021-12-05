@extends('tenant.frontend.layout.app')


@section('content')

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
                alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="{{route('register.customer')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        @error('name')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                        <input type="text" name="name" id="form3Example3" value="{{ old('name') }}" class="form-control form-control-lg"
                        placeholder="Enter your name" />
                        <label class="form-label" for="form3Example3">Name</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        @error('phone_no')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                        <input type="text" name="phone_no" id="form3Example3" value="{{ old('phone_no') }}" class="form-control form-control-lg"
                        placeholder="Enter your phone" />
                        <label class="form-label" for="form3Example3">Phone No</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        @error('email')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                        <input type="email" name="email" id="form3Example3" value="{{ old('email') }}" class="form-control form-control-lg"
                        placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>
                    
                    <div class="form-outline mb-3">
                        @error('password')
                        <p class="help-block" style="color: red;">{{$message}}</p>
                        @enderror
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    
                    <div class="form-outline mb-3">
                        <input type="password" name="password_confirmation" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Confirm Password</label>
                    </div>
                    
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{route('login')}}"
                            class="link-danger">Login</a></p>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    @endsection