@extends('central.backend.layout.app')

@section('css')
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Agencies</h4>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
            <li class="breadcrumb-item" aria-current="page">Users</li>
            <li class="breadcrumb-item active" aria-current="page">Agencies</li>
        </ol>
    </div>
</div>
<!--End Page header-->
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-12">
        
        <!--div-->
        <div class="card">
            <div class="card-header">
                <div class="card-title">All Agencies</div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap key-buttons agencies" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-20p border-bottom-0">Domain</th>
                                    <th class="wd-15p border-bottom-0">Agency name</th>
                                    <th class="wd-15p border-bottom-0">User name</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agencies as $agency)
                                <tr>
                                    <td>{{$agency->tenant->domains[0]->domain}}</td>
                                    <td>{{$agency->agency_name}}</td>
                                    <td>{{$agency->name}}</td>
                                    <td>{{$agency->email}}</td>
                                    <td>
                                        @switch($agency->is_approved)
                                        @case(0)
                                        <span class="badge badge-danger">Declined</span>
                                        @break
                                        @case(1)
                                        <span class="badge badge-success">Approved</span>
                                        @break
                                        @default
                                        <span class="badge badge-info">Pending</span>
                                        @endswitch
                                    </td>
                                    <td><a href="{{route('admin.agency.profile', ['tenantId' => $agency->tenant->id])}}" class="btn btn-indigo btn-sm">Profile</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                            {{-- <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Agency name</th>
                                    <th class="wd-15p border-bottom-0">User name</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead> --}}


                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        
    </div>
</div>
<!-- /Row -->

</div>
</div><!-- end app-content-->
</div>
@endsection
@section('js')
<!-- Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/datatables.js')}}"></script>
<!-- Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>

{{-- <script type="text/javascript">
    $(function () {
        
        var table = $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.agencies.show') }}",
            columns: [
            {data: 'agency_name', name: 'agency_name'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
            ]
        });
        
    });
</script> --}}

@endsection