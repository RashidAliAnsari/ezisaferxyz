@section('css')
    <!-- Morris Charts css -->
    <link href="{{ URL::asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <!--Daterangepicker css-->
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
@endsection

<x-page-header title="Profile">
    <li class="breadcrumb-item"><a href="{{ route('tenant.home') }}" class="d-flex"><svg class="svg-icon"
                xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
            </svg><span class="breadcrumb-icon"> Home</span></a></li>
    <li class="breadcrumb-item" aria-current="page">Setting</li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
</x-page-header>


<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subscription Information</h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Agency Status</span>
                                </td>
                                <td class="py-2 px-0">
                                    @switch($this->agency->is_approved)
                                        @case(0)
                                            DECLINED
                                        @break
                                        @case(1)
                                            APPROVED
                                        @break
                                        @default
                                            PENDING
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Package Type</span>
                                </td>
                                <td class="py-2 px-0 text-info">Free</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Subdomain</span>
                                </td>
                                <td class="py-2 px-0">{{ $subdomain }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Registration Date</span>
                                </td>
                                <td class="py-2 px-0">10 Mar 2021</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Expiry Date</span>
                                </td>
                                <td class="py-2 px-0">11 Dec 2022</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">No Of Users</span>
                                </td>
                                <td class="py-2 px-0">{{ $no_of_users }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">No Of Travel Package</span>
                                </td>
                                <td class="py-2 px-0">0</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">SMS Subscription</span>
                                </td>
                                <td class="py-2 px-0">Not Applicable</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">WHATSAPP Subscription</span>
                                </td>
                                <td class="py-2 px-0">Not Applicable</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Announcement/News</span>
                                </td>
                                <td class="py-2 px-0">Not Applicable</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50"><button wire:click="upgradePackage"
                                            class="btn btn-lg btn-primary">Upgrade Package</button></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="card">
            <form wire:submit.prevent="submit">
                <div class="card-header">
                    <div class="card-title">Update Profile</div>
                </div>
                <div class="card-body">
                    <div class="card-title font-weight-bold">Agency Information:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Agency Name<span class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Agency Name"
                                    wire:model.debounce.500ms="form.agency_name">
                                @error('form.agency_name')<p class="help-block input-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tourism License Number<span
                                        class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Tourism License Number"
                                    wire:model.debounce.500ms="form.tourism_license_number">
                                @error('form.tourism_license_number')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Registration Number<span
                                        class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Company Registration Number"
                                    wire:model.debounce.500ms="form.company_registration_number">
                                @error('form.company_registration_number')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Business Type<span class="input-required">*</span></label>
                                <select class="form-control nice-select  select2"
                                    wire:model.debounce.500ms="form.business_type">
                                    <option value="">-- Select Business Type --</option>
                                    @foreach ($business_types as $type)
                                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.business_type')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Acronym<span
                                        class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Company Acronym"
                                    wire:model.debounce.500ms="form.company_acronym">
                                @error('form.company_acronym')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">No Of Branch<span class="input-required">*</span></label>
                                <input type="number" class="form-control" placeholder="No Of Branch"
                                    wire:model.debounce.500ms="form.no_of_branch">
                                @error('form.no_of_branch')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Address<span class="input-required">*</span></label>
                                <input type="text" id="autocomplete" class="form-control" placeholder="Address"
                                    autocomplete="off" wire:model.debounce.500ms="form.address">
                                @error('form.address')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                                <input type="hidden" id="latitude" class="form-control" placeholder="Latitude"
                                    readonly wire:model.debounce.500ms="form.latitude">
                                <input type="hidden" id="longitude" class="form-control" placeholder="Longitude"
                                    readonly wire:model.debounce.500ms="form.longitude">
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Latitude</label>
                                <input type="text" id="latitude" class="form-control" placeholder="Latitude" readonly
                                    wire:model.debounce.500ms="form.latitude">
                                @error('form.latitude')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Longitude</label>
                                <input type="text" id="longitude" class="form-control" placeholder="Longitude"
                                    readonly wire:model.debounce.500ms="form.longitude">
                                @error('form.longitude')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" id="country" class="form-control" placeholder="Country" readonly
                                    wire:model.debounce.500ms="form.country">
                                @error('form.country')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <input type="text" id="state" class="form-control" placeholder="State" readonly
                                    wire:model.debounce.500ms="form.state">
                                @error('form.state')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" id="city" class="form-control" placeholder="City" readonly
                                    wire:model.debounce.500ms="form.city">
                                @error('form.city')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Postcode</label>
                                <input type="text" id="zip" class="form-control" placeholder="Postcode" readonly
                                    wire:model.debounce.500ms="form.post_code">
                                @error('form.post_code')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">Contact Information:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Contact Person<span
                                        class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Contact Person"
                                    wire:model.debounce.500ms="form.contact_person">
                                @error('form.contact_person')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Telephone<span class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Telephone"
                                    wire:model.debounce.500ms="form.telephone">
                                @error('form.telephone')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Fax No</label>
                                <input type="text" class="form-control" placeholder="Fax No"
                                    wire:model.debounce.500ms="form.fax_no">
                                @error('form.fax_no')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Handphone<span class="input-required">*</span></label>
                                <input type="text" class="form-control" placeholder="Handphone"
                                    wire:model.debounce.500ms="form.handphone">
                                @error('form.handphone')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email<span class="input-required">*</span></label>
                                <input type="email" class="form-control" placeholder="Email"
                                    wire:model.debounce.500ms="form.email" readonly>
                                @error('form.email')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" placeholder="Website"
                                    wire:model.debounce.500ms="form.website" readonly>
                                @error('form.website')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">Bank Information:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" class="form-control" placeholder="Account Holder Name"
                                    wire:model.debounce.500ms="form.account_holder_name">
                                @error('form.account_holder_name')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank Name</label>
                                <select class="form-control nice-select  select2"
                                    wire:model.debounce.500ms="form.bank_name">
                                    <option value="">-- Select Bank Name --</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank Account Number</label>
                                <input type="text" class="form-control" placeholder="Bank Account Number"
                                    wire:model.debounce.500ms="form.bank_account_number">
                                @error('form.bank_account_number')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">Logos:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Banner Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="example-file-input-custom"
                                        wire:model.debounce.500ms="form.banner_logo">
                                    <label class="custom-file-label">
                                        @if (isset($form['banner_logo']))
                                            File Selected
                                        @else
                                            Choose file ( jpg | png | jpge ) - 1MB Max
                                        @endif
                                    </label>
                                </div>
                                @error('form.banner_logo')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                                <small class="form-text text-muted">Will be used on your site Login-Signup
                                    pages</small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="example-file-input-custom"
                                        wire:model.debounce.500ms="form.profile_logo">
                                    <label class="custom-file-label">
                                        @if (isset($form['profile_logo']))
                                            File Selected
                                        @else
                                            Choose file ( jpg | png | jpge ) - 1MB Max
                                        @endif
                                    </label>
                                </div>
                                @error('form.profile_logo')<p class="help-block input-error">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-lg btn-primary">Updated</button>
                    {{-- <a href="#" class="btn btn-lg btn-danger">Cancel</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>


@section('js')
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyCi21EKu0cwQuB3BiGzUvwWmCXwJ6kt6gQ&libraries=places"></script>
    <script>
        $(document).ready(function() {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });
    </script>
    {{-- <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        }
    </script> --}}

    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function() {
            var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
            google.maps.event.addListener(places, 'place_changed', function() {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var latlng = new google.maps.LatLng(latitude, longitude);
                var geocoder = geocoder = new google.maps.Geocoder();
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            // console.log(results[0]);
                            // var address = results[0].formatted_address;
                            // var pin = results[0].address_components[results[0].address_components
                            //     .length - 1].long_name;
                            // var country = results[0].address_components[results[0]
                            //     .address_components.length - 2].long_name;
                            // var state = results[0].address_components[results[0].address_components
                            //     .length - 3].long_name;
                            // var city = results[0].address_components[results[0].address_components
                            //     .length - 4].long_name;
                            // document.getElementById('country').value = country;
                            // document.getElementById('state').value = state;
                            // document.getElementById('city').value = city;
                            // document.getElementById('zip').value = pin;
                            let parts = results[0].address_components;
                            parts.forEach(part => {
                                if (part.types.includes('country')) {
                                    //we found "country" inside the data.results[0].address_componenets[x].types array
                                    $('#country').val(part.long_name); // country
                                }
                                if (part.types.includes("administrative_area_level_1")) {
                                    $('#state').val(part.long_name); // province
                                }
                                if (part.types.includes("administrative_area_level_2")) {
                                    $('#city').val(part.long_name); // city
                                }
                                if (part.types.includes("postal_code")) {
                                    $('#zip').val(part.long_name); // region
                                }
                            })
                        }
                    }
                });
            });
        });
    </script>



@endsection
