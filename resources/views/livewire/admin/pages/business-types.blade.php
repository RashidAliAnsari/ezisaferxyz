@section('css')
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- Slect2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection


<x-page-header title="Business Types">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="d-flex"><svg class="svg-icon"
                xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
            </svg><span class="breadcrumb-icon"> Home</span></a></li>
    <li class="breadcrumb-item" aria-current="page">Pages</li>
    <li class="breadcrumb-item active" aria-current="page">Business Types</li>
</x-page-header>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a class="modal-effect btn btn-primary btn-block mb-3" data-effect="effect-fall" data-toggle="modal"
                        href="#modaldemo8"><i class="fe fe-upload mr-2"></i>Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap key-buttons agencies" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-20p border-bottom-0">Sr No</th>
                                    <th class="wd-30p border-bottom-0">Business Type</th>
                                    <th class="wd-25p border-bottom-0">Is Active</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($business_types as $type)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->is_active ? 'YES' : 'NO' }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove-key" data-toggle="modal"
                                                data-target="#confirm-delete"
                                                wire:click="destroyId('{{ $type->id }}')">Delete</button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#update-modal"
                                                wire:click="edit('{{ $type->id }}', '{{ $type->name }}')">Edit</button>
                                            @if ($type->is_active)
                                                <button class="btn btn-primary btn-sm"
                                                    wire:click="deactivate('{{ $type->id }}')">Deactive</button>
                                            @else
                                                <button class="btn btn-info btn-sm"
                                                    wire:click="activate('{{ $type->id }}')">Active</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- MODAL EFFECTS -->
    <div wire:ignore.self class="modal" id="modaldemo8" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Business Type</h6><button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Business Type"
                                    wire:model.debounce.500ms="form.business_type">
                                @error('form.business_type')<p class="help-block input-error modal-input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-indigo" type="submit">Save changes</button> <button
                            class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- MODAL EFFECTS END-->

    <x-confirm-delete></x-confirm-delete>
    <x-admin.business-types-update></x-admin.business-types-update>


</div>
<!-- /Row -->


</div>
</div><!-- end app-content-->
</div>


@section('js')
    <!-- Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/datatables.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
@endsection
