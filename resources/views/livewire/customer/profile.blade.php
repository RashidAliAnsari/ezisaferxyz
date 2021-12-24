@section('css')
    <!-- Morris Charts css -->
    <link href="{{ URL::asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <!--Daterangepicker css-->
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
@endsection

<x-page-header title="Profile Edit">
    <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}" class="d-flex"><svg
                class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
            </svg><span class="breadcrumb-icon">Dashboard</span></a></li>
    <li class="breadcrumb-item" aria-current="page">Setting</li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
</x-page-header>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Profile</div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="submit" method="POST">
                    <div class="card-title font-weight-bold">Basci info:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Customer Name</label>
                                <input type="text" wire:model="customer_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">User Name</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" wire:model="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="number" wire:model="phone_no" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Home Address">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Postal Code</label>
                                <input type="number" class="form-control" placeholder="ZIP Code">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control nice-select  select2">
                                    <optgroup label="Categories">
                                        <option data-select2-id="5">--Select--</option>
                                        <option value="1">Germany</option>
                                        <option value="2">Real Estate</option>
                                        <option value="3">Canada</option>
                                        <option value="4">Usa</option>
                                        <option value="5">Afghanistan</option>
                                        <option value="6">Albania</option>
                                        <option value="7">China</option>
                                        <option value="8">Denmark</option>
                                        <option value="9">Finland</option>
                                        <option value="10">India</option>
                                        <option value="11">Kiribati</option>
                                        <option value="12">Kuwait</option>
                                        <option value="13">Mexico</option>
                                        <option value="14">Pakistan</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">External Links:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Google</label>
                                <input type="text" class="form-control" placeholder="https://www.google.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pinterest</label>
                                <input type="text" class="form-control" placeholder="https://in.pinterest.com/">
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">About:</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">About Me</label>
                                <textarea rows="5" class="form-control"
                                    placeholder="Enter About your description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <a href="#" class="btn btn-lg btn-primary">Updated</a>
                <a href="#" class="btn btn-lg btn-danger">Cancle</a>
            </div>
        </div>
    </div>
</div>
