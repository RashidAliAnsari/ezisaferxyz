@extends('central.backend.layout.app')

@section('css')
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<!-- Animate css -->
<link href="{{URL::asset('assets/css/animated.css')}}" rel="stylesheet" />
<!-- Bootstrap Editable -->
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<style>
    .glyphicon-ok:before {
        content: "\f00c";
    }
    .glyphicon-remove:before {
        content: "\f00d";
    }
    .glyphicon {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .swal2-container, .swal2-toast{
        background: #8E98DB !important;
    }
    #swal2-title{
        color: white !important;
    }
</style>
@endsection
@section('page-header')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Languages</h4>
    </div>
    <div class="page-rightheader ml-auto d-lg-flex d-none">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Languages</li>
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
                <div class="card-title">
                    <a class="modal-effect btn btn-primary btn-block mb-3" data-effect="effect-fall" data-toggle="modal" href="#modaldemo8"><i class="fe fe-upload mr-2"></i>Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap key-buttons agencies" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Key</th>
                                    @if ($languages->count() > 0)
                                    @foreach ($languages as $language)
                                    <th class="wd-30p border-bottom-0">{{$language->name}} ({{$language->code}})</th>
                                    @endforeach
                                    @endif
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($columnsCount > 0)
                                @foreach($columns[0] as $columnKey => $columnValue)
                                <tr>
                                    <td><a href="#" class="translate-key" data-title="Enter Key" data-type="text" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json.key') }}">{{ $columnKey }}</a></td>
                                    @for($i=1; $i<=$columnsCount; ++$i)
                                    <td><a href="#" data-title="Enter Translate" class="translate" data-code="{{ $columns[$i]['lang'] }}" data-type="textarea" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json') }}">{{ isset($columns[$i]['data'][$columnKey]) ? $columns[$i]['data'][$columnKey] : '' }}</a></td>
                                    @endfor
                                    {{-- <td><a href="{{ route('admin.translations.destroy', ['key' => $columnKey]) }}" class="btn btn-danger btn-sm remove-key">Delete</a></td> --}}
                                    <td><button data-action="{{ route('admin.translations.destroy', $columnKey) }}" class="btn btn-danger btn-sm remove-key">Delete</button></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            
                            
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

<!-- MODAL EFFECTS -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <form action="{{route('admin.translations.create')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Add New Translation</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <input type="text" name="key" class="form-control" id="exampleInputEmail1" placeholder="Enter Key...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="value_en" class="form-control" id="exampleInputEmail1" placeholder="Enter English Value...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="value_ms" class="form-control" id="exampleInputEmail1" placeholder="Enter Malay Value...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo" type="submit">Save changes</button> <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
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
<!-- Bootstrap Editable -->
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('.translate').editable({
            mode: 'inline',
            params: function(params) {
                params.code = $(this).editable().data('code');
                return params;
            }
        });
        
        $('.translate-key').editable({
            mode: 'inline',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'Key is required';
                }
            }
        });
        
        $('body').on('click', '.remove-key', function(){
            var cObj = $(this);
            
            if (confirm("Are you sure want to remove this item?")) {
                $.ajax({
                    url: cObj.data('action'),
                    method: 'DELETE',
                    success: function(data) {
                        cObj.parents("tr").remove();
                        // alert("Your imaginary file has been deleted.");
                        // toastr.success('data.message', 'data.title');
                        //SweetAlert2 Toast
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'bottom-end',
                            showConfirmButton: false,
                            timer: 30000
                        });
                        
                        Toast.fire({
                            icon: 'success',
                            title: 'Your Translation deleted successfully!.'
                        });
                        
                    }
                });
            }
            
            
        });
        
        
    });
</script>

@endsection