@section('css')
    <!-- Morris Charts css -->
    <link href="{{ URL::asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <!--Daterangepicker css-->
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title">Analytics Dashboard</h4>
        </div>
        <div class="page-rightheader ml-auto d-lg-flex d-none">
            <div class="ml-5 mb-0">
                <a class="btn btn-white date-range-btn" href="#" id="daterange-btn">
                    <svg class="header-icon2 mr-3" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%"
                        preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path d="M5 8h14V6H5z" opacity=".3" />
                        <path
                            d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z" />
                    </svg> <span>Select Date
                        <i class="fa fa-caret-down"></i></span>
                </a>
            </div>
        </div>
    </div>
    <!--End Page header-->
@endsection

<!--Row-->
<div class="row">
    <div class="col-xl-6 col-md-12 col-lg-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-7 col-md-12 col-lg-6">
                        <div class="d-block card-header border-0 text-center px-0">
                            <h3 class="text-center mb-4">Congratulations <b>John!</b></h3>
                            <small>You have reached Page Views</small>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h2 class="mb-0 fs-40 counter font-weight-bold">10M</h2>
                                <h6 class="mt-4 text-white-50">You have done 100% reached target today.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-12 col-lg-6">
                        <img class="mx-auto text-center w-90 analytics-img"
                            src="{{ URL::asset('assets/images/photos/award.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="fs-50 icon-muted"><i class="si si-chart icon-dropshadow-info text-info"></i></span>
                <p class=" mb-1">Bounce Rate</p>
                <h2 class="mb-1 fs-40 font-weight-bold">52.12%</h2>
                <small class="mb-1 text-muted"><small class="text-success"><i class="fa fa-caret-up  mr-1"></i>
                        19.8</small> vs 36,144 than last month</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="fs-50 icon-muted"><i class="si si-wallet icon-dropshadow-danger text-danger"></i></span>
                <p class=" mb-1 ">Revenue Status</p>
                <h2 class="mb-1 fs-40 font-weight-bold">$2,206.62</h2>
                <small class="mb-1 text-muted"><small class="text-danger"><i class="fa fa-caret-down  mr-1"></i>
                        43.2</small> vs $5,699 than last month</small>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-file-outline card-custom-icon icon-dropshadow-primary text-primary fs-60"></i>
                        <p class=" mb-1">Page Views</p>
                        <h2 class="mb-1 font-weight-bold">234k</h2>
                        <span class="mb-1 text-muted"><span class="text-danger"><i
                                    class="fa fa-caret-down  mr-1"></i> 43.2</span> than last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-clock card-custom-icon icon-dropshadow-warning text-warning fs-60"></i>
                        <p class=" mb-1">Time On Site</p>
                        <h2 class="mb-1 font-weight-bold">12m 3s</h2>
                        <span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i>
                                19.8</span> than last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <i
                            class="mdi mdi-heart-outline card-custom-icon icon-dropshadow-success text-success fs-60"></i>
                        <p class=" mb-1">Impressions</p>
                        <h2 class="mb-1 font-weight-bold">168</h2>
                        <span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i>
                                0.8%</span> than last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <i
                            class="mdi mdi-account-multiple-outline card-custom-icon icon-dropshadow-secondary text-secondary fs-60"></i>
                        <p class=" mb-1">Total Followers</p>
                        <h2 class="mb-1 font-weight-bold">3456k</h2>
                        <span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i>
                                0.8%</span> than last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck">
    <div class="col-xl-3 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Follower Growth</h3>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-12 mb-4 mt-sm-0">
                        <div class="mx-auto chart-circle chart-circle-primary chart-circle-lg  mt-sm-0 mb-0 donutShadow"
                            data-value="0.85" data-thickness="15" data-color="#4454c3">
                            <div class="mx-auto chart-circle-value text-center mb-2">
                                <h1 class="mb-0 mt-2">85%</h1><small>Goal</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="mb-0 fs-50 mt-3 counter  font-weight-bold">65,268</h2>
                        <span class=" fs-12 text-muted"><span class="text-danger mr-1"><i
                                    class="fe fe-arrow-down ml-1"></i>0.82%</span> since last week</span>
                        <p class="mt-5 mb-2 text-muted">It is a long established fact that a ayout. </p>
                        <small class="mt-1 fs-12 text-muted">Updated 20 minutes ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header mb-4">
                <h3 class="card-title">Country Wise Page Views</h3>
            </div>
            <div class="p-2">
                <h5 class="pl-4 font-weight-bold mb-4">This Week Page Views</h5>
                <table class="table card-table text-nowrap">
                    <tbody>
                        <tr>
                            <td class="w-1"><i class="flag flag-us"></i></td>
                            <td>USA
                            </td>
                            <td class="w-3 text-right"><span class="">6425</span></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-cn"></i></td>
                            <td>Chaina
                            </td>
                            <td class="w-3 text-right"><span class="">5582</span></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-de"></i></td>
                            <td>Germany
                            </td>
                            <td class="w-3 text-right"><span class="">4587</span></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-ru"></i></td>
                            <td>Russia
                            </td>
                            <td class="w-3 text-right"><span class="">2520</span></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-in"></i></td>
                            <td>India
                            </td>
                            <td class="w-3 text-right"><span class="">6429</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-lg btn-block btn-white">View All</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12 col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card-header">
                        <h4 class="card-title">Website Overview</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="myfirstchart" class="BarChartShadow" style="height: 285px;"></div>
                        <div class="row mt-5">
                            <div class="col text-center">
                                <span class="text-muted float-right">
                                    <div class="w-3 h-3 bg-primary br-3 mr-1 mt-1 float-left"></div> Page views
                                </span>
                            </div>
                            <div class="col text-center">
                                <span class="text-muted float-left">
                                    <div class="w-3 h-3 bg-secondary br-3 mr-1 mt-1 float-left"></div> New Visitors
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Country Traffic Source</h3>
                <div class="card-options ">
                    <div class="btn-group ml-3 mb-0">
                        <a class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> Download Print</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Yearly</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive card-body">
                <table class="table mg-b-0 text-nowrap">
                    <thead>
                        <tr>
                            <th class="wd-45p border-bottom-0 py-4 font-weight-bold">Country</th>
                            <th class="border-bottom-0 py-4 font-weight-bold text-center">Total Traffic</th>
                            <th class="border-bottom-0 py-4 font-weight-bold text-center">Entrances</th>
                            <th class="border-bottom-0 py-4 font-weight-bold text-center">Bounce Rate</th>
                            <th class="border-bottom-0 py-4 font-weight-bold text-center">Exits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="flag flag-us flag-icon-squared mr-2"></i> <strong>United States</strong></td>
                            <td class="text-center"><strong>4534</strong></td>
                            <td class="text-center"><strong>134</strong> (1.51%)</td>
                            <td class="text-center">33.58% <i class="fa fa-caret-up text-success"></i></td>
                            <td class="text-center">15.47% <i class="fa fa-caret-up text-success"></i></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-gb flag-icon-squared mr-2"></i> <strong>United Kingdom</strong>
                            </td>
                            <td class="text-center"><strong>5463</strong></td>
                            <td class="text-center"><strong>290</strong> (3.30%)</td>
                            <td class="text-center">9.22% <i class="fa fa-caret-down text-danger"></i></td>
                            <td class="text-center">7.99% <i class="fa fa-caret-up text-success"></i></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-in flag-icon-squared mr-2"></i> <strong>India</strong></td>
                            <td class="text-center"><strong>6534</strong></td>
                            <td class="text-center"><strong>250</strong> (3.00%)</td>
                            <td class="text-center">20.75% <i class="fa fa-caret-down text-danger"></i></td>
                            <td class="text-center">2.40% <i class="fa fa-caret-down text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-ca flag-icon-squared mr-2"></i> <strong>Canada</strong></td>
                            <td class="text-center"><strong>4532</strong></td>
                            <td class="text-center"><strong>216</strong> (2.79%)</td>
                            <td class="text-center">32.07% <i class="fa fa-caret-up text-success"></i></td>
                            <td class="text-center">15.09% <i class="fa fa-caret-down text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-fr flag-icon-squared mr-2"></i> <strong>France</strong></td>
                            <td class="text-center"><strong>5643</strong></td>
                            <td class="text-center"><strong>216</strong> (2.79%)</td>
                            <td class="text-center">32.07% <i class="fa fa-caret-down text-danger"></i></td>
                            <td class="text-center">15.09% <i class="fa fa-caret-up text-success"></i></td>
                        </tr>
                        <tr>
                            <td><i class="flag flag-cn flag-icon-squared mr-2"></i> <strong>China</strong></td>
                            <td class="text-center"><strong>6534</strong></td>
                            <td class="text-center"><strong>216</strong> (2.79%)</td>
                            <td class="text-center">32.07% <i class="fa fa-caret-down text-danger"></i></td>
                            <td class="text-center">15.09% <i class="fa fa-caret-up text-success"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Website Visitors</h3>
            </div>
            <div class="card-body text-center mx-auto">
                <div class="overflow-hidden">
                    <canvas class="canvasDoughnut" height="240" width="310"></canvas>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col text-center">
                        <span class="text-muted float-left">
                            <div class="w-4 h-3 bg-success br-3 mr-1 mt-1 float-left"></div> Local
                        </span>
                    </div>
                    <div class="col text-center">
                        <span class="text-muted float-left">
                            <div class="w-4 h-3 bg-primary br-3 mr-1 mt-1 float-left"></div> Domestic
                        </span>
                    </div>
                    <div class="col col-auto text-center">
                        <span class="text-muted float-left">
                            <div class="w-4 h-3 bg-danger br-3 mr-1 mt-1 float-left"></div> International
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End row-->

<!--Row-->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Most Visted Pages</h3>
                <div class="card-options ">
                    <div class="btn-group ml-3 mb-0">
                        <a class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> Download Print</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Yearly</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap mb-0 border">
                            <thead>
                                <tr>
                                    <th class="wd-lg-10p">Page Name</th>
                                    <th class="wd-lg-20p text-center">Browsers</th>
                                    <th class="wd-lg-20p text-center">Visitors</th>
                                    <th class="wd-lg-20p text-center">Unique Page Visitors</th>
                                    <th class="wd-lg-20p text-center">Bounce Rate</th>
                                    <th class="text-center">Page Updated</th>
                                    <th class="text-center">Preview</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>home/index</td>
                                    <td class="text-center">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/1.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/2.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/3.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/4.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/5.jpg') }})"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">3456</td>
                                    <td class="text-center">556</td>
                                    <td class="text-center">13.6 <i class="fa fa-caret-down text-danger"></i></td>
                                    <td class="text-nowrap text-center">July 13, 2020</td>
                                    <td class="w-1 text-center"><a href="#" class="btn btn-icon2 btn-white"><i
                                                class="fe fe-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Store/shop/cart</td>
                                    <td class="text-center">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/6.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/6.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/8.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/9.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/10.jpg') }})"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">3456</td>
                                    <td class="text-center">556</td>
                                    <td class="text-center">13.6 <i class="fa fa-caret-down text-danger"></i></td>
                                    <td class="text-nowrap text-center">June 15, 2020</td>
                                    <td class="w-1 text-center"><a href="#" class="btn btn-icon2 btn-white"><i
                                                class="fe fe-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Store/shop</td>
                                    <td class="text-center">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/11.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/12.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/13.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/14.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/15.jpg') }})"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">3456</td>
                                    <td class="text-center">556</td>
                                    <td class="text-center">13.6 <i class="fa fa-caret-down text-danger"></i></td>
                                    <td class="text-nowrap text-center">July 8, 2020</td>
                                    <td class="w-1 text-center"><a href="#" class="btn btn-icon2 btn-white"><i
                                                class="fe fe-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>home/blog</td>
                                    <td class="text-center">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/16.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/2.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/9.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/2.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/4.jpg') }})"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">3456</td>
                                    <td class="text-center">556</td>
                                    <td class="text-center">13.6 <i class="fa fa-caret-down text-danger"></i></td>
                                    <td class="text-nowrap text-center">June 28, 2020</td>
                                    <td class="w-1 text-center"><a href="#" class="btn btn-icon2 btn-white"><i
                                                class="fe fe-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>home/blog/blog-overview</td>
                                    <td class="text-center">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/12.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/2.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/9.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/2.jpg') }})"></span>
                                            <span class="avatar brround"
                                                style="background-image: url({{ URL::asset('assets/images/users/4.jpg') }})"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">3456</td>
                                    <td class="text-center">556</td>
                                    <td class="text-center">13.6 <i class="fa fa-caret-down text-danger"></i></td>
                                    <td class="text-nowrap text-center">July 2, 2020</td>
                                    <td class="w-1 text-center"><a href="#" class="btn btn-icon2 btn-white"><i
                                                class="fe fe-eye"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End row-->
</div>
</div><!-- end app-content-->
</div>

@section('js')
    <!--Moment js-->
    <script src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>
    <!-- Daterangepicker js-->
    <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/daterange.js') }}"></script>
    <!--Chart js -->
    <script src="{{ URL::asset('assets/plugins/chart/chart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/chart.extension.js') }}"></script>
    <!-- ECharts js-->
    <script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
    <script src="{{ URL::asset('assets/js/index2.js') }}"></script>
@endsection
