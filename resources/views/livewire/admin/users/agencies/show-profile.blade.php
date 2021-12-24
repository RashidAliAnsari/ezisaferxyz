{{-- <x-page-header title="Agencies">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="d-flex"><svg class="svg-icon"
                xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
            </svg><span class="breadcrumb-icon"> Home</span></a></li>
    <li class="breadcrumb-item" aria-current="page">Users</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.agencies.show') }}">Agencies</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agency Profile</li>
</x-page-header> --}}

<!-- Row -->
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card box-widget widget-user">
            <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle"
                    src="{{ URL::asset('assets/images/users/16.jpg') }}"></div>
            <div class="card-body text-center">
                <div class="pro-user">
                    <h4 class="pro-user-username text-dark mb-1 font-weight-bold">{{ $AgencyProfile->agency_name }}
                    </h4>
                    <h6 class="pro-user-desc text-muted">{{ $AgencyProfile->tenant->domains[0]->domain }}</h6>

                    @switch($AgencyProfile->is_approved)
                        @case(0)
                            <button wire:click="AgencyApprove({{ $AgencyProfile->tenant->id }}, '1')"
                                class="btn btn-success btn-sm mt-3">Approve</button>
                        @break
                        @case(1)
                            {{-- <button wire:click="AgencyApprove('{{ $AgencyProfile->tenant->id }}, 0')" --}}
                            <button wire:click="test" class="btn btn-danger btn-sm mt-3">Decline</button>
                        @break
                        @default
                            <button wire:click="AgencyApprove({{ $AgencyProfile->tenant->id }}, '1')"
                                class="btn btn-success btn-sm mt-3">Approve</button>
                            {{-- <button wire:click="AgencyApprove('{{ $AgencyProfile->tenant->id }}, 0')" --}}
                            <button wire:click="test" class="btn btn-danger btn-sm mt-3">Decline</button>
                    @endswitch
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Personal Details</h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Name </span>
                                </td>
                                <td class="py-2 px-0">{{ $AgencyProfile->name }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td class="py-2 px-0 text-info">
                                    @switch($AgencyProfile->is_approved)
                                        @case(0)
                                            Declined
                                        @break
                                        @case(1)
                                            Approved
                                        @break
                                        @default
                                            Pending
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Website </span>
                                </td>
                                <td class="py-2 px-0">{{ $AgencyProfile->tenant->domains[0]->domain }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Email </span>
                                </td>
                                <td class="py-2 px-0">{{ $AgencyProfile->email }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Phone </span>
                                </td>
                                <td class="py-2 px-0">{{ $AgencyProfile->phone_no }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="main-content-body main-content-body-profile card mg-b-20">
            <!-- main-profile-body -->
            <div class="main-profile-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="about">
                        <div class="card-body">
                            <h5 class="font-weight-bold">Biography</h5>
                            <div class="main-profile-bio mb-0">
                                <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has survived not only five centuries
                                    nchanged.</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <p class="mb-0">pleasure rationally encounter but because pursue consequences
                                    that are extremely painful.occur in which toil and pain can procure him some great
                                    pleasure.. <a href="">More</a></p>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h5 class="font-weight-bold">Work & Education</h5>
                            <div class="main-profile-contact-list d-lg-flex">
                                <div class="media mr-5">
                                    <div class="media-icon bg-success-transparent text-success mr-4">
                                        <i class="fa fa-whatsapp"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="font-weight-bold mb-1">Web Designer at <a href=""
                                                class="btn-link">Spruko</a></h6>
                                        <span>2018 - present</span>
                                        <p>Past Work: Spruko, Inc.</p>
                                    </div>
                                </div>
                                <div class="media mr-5">
                                    <div class="media-icon bg-danger-transparent text-danger mr-4">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="font-weight-bold mb-1">Studied at <a href=""
                                                class="btn-link">University</a></h6>
                                        <span>2004-2008</span>
                                        <p>Graduation: Bachelor of Science in Computer Science</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h5 class="font-weight-bold">Skills</h5>
                            <a class="btn btn-sm btn-white mt-1" href="#">HTML5</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">CSS</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Java Script</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Photo Shop</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Php</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Wordpress</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Sass</a>
                            <a class="btn btn-sm btn-white mt-1" href="#">Angular</a>
                        </div>
                        <div class="card-body border-top">
                            <h5 class="font-weight-bold">Contact</h5>
                            <div class="main-profile-contact-list d-lg-flex">
                                <div class="media mr-4">
                                    <div class="media-icon bg-primary-transparent text-primary mr-3 mt-1">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <small class="text-muted">Mobile</small>
                                        <div class="font-weight-bold">
                                            +245 354 654
                                        </div>
                                    </div>
                                </div>
                                <div class="media mr-4">
                                    <div class="media-icon bg-warning-transparent text-warning mr-3 mt-1">
                                        <i class="fa fa-slack"></i>
                                    </div>
                                    <div class="media-body">
                                        <small class="text-muted">Stack</small>
                                        <div class="font-weight-bold">
                                            @spruko.com
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info mr-3 mt-1">
                                        <i class="fa fa-map"></i>
                                    </div>
                                    <div class="media-body">
                                        <small class="text-muted">Current Address</small>
                                        <div class="font-weight-bold">
                                            San Francisco, USA
                                        </div>
                                    </div>
                                </div>
                            </div><!-- main-profile-contact-list -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div><!-- end app-content-->
</div>
