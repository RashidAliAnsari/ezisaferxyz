@extends('tenant.frontend.layout.app')


@section('content')

<div class="col-md-8">
    
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif

    <form method="post" action="{{route('verify.email.post')}}">
        @csrf
        <div class="row">
            <div class="col">
                <input type="text" name="verification_code" id="verification_code" class="form-control" placeholder="Enter verification code" autocomplete="off">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-dark">Verify</button>
            </div>
        </div>
    </form>
</div>

@endsection