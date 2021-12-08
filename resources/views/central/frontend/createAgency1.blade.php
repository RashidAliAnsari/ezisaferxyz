@extends('central.frontend.layout.app')

@section('content')
<div class="col-md-12">
    <form class="form-horizontal" action='{{url('create/agency')}}' method="POST">
        @csrf
        <fieldset>
            <div id="legend">
                <legend class="">Register Agency</legend>
            </div>
            <div class="control-group">
                <label class="control-label"  for="agency_name">Agency Name</label>
                <div class="controls">
                    <input type="text" id="agency_name" name="agency_name" value="{{ old('agency_name') }}" class="input-xlarge">
                    @error('agency_name')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="domain">Your subdomain</label>
                <div class="controls">
                    <input type="text" id="domain" name="domain" value="{{ old('domain') }}" class="input-xlarge">
                    @error('domain')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="name">Your Name</label>
                <div class="controls">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="input-xlarge">
                    @error('name')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="phone_no">Phone No</label>
                <div class="controls">
                    <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" class="input-xlarge">
                    @error('phone_no')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="input-xlarge">
                    @error('email')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="input-xlarge">
                    @error('password')
                    <p class="help-block" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label"  for="password_confirmation">Password (Confirm)</label>
                <div class="controls">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="input-xlarge">
                </div>
            </div>
            
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Register</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection