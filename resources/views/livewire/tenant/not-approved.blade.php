@section('css')
<!-- Morris Charts css -->
<link href="{{URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" />
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<!--Daterangepicker css-->
<link href="{{URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Profile Not Approved</h4>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Profile Approval</li>
        </ol>
    </div>
</div>
<!--End Page header-->
@endsection


<div class="row" style="min-height:calc(100vh - 50px);">
    <div class="col-md-12 col-xl-12 col-lg-12">
        <div class="card text-center">
            <div class="card-body"> <span>Profile Status</span>
                <h3 class=" mb-1 mt-3 font-weight-bold">
                    @if (Auth::user()->is_approved == 0)
                    Your profile has been declined.Please submit your profile details again.Thanks!
                    @endif
                    @if (Auth::user()->is_approved == 2)
                    Your current profile status is pending.Please wait for admin action.Thanks!
                    @endif
                </h3>
                <p>Make sure you submit you <a href="{{route('tenant.profile')}}">Complete Profile</a></p>
                {{-- <div class="text-muted"><i class="si si-arrow-up-circle text-danger"></i> <span class="">15%</span> Increase</div> --}}
            </div>
        </div>
    </div>
</div>