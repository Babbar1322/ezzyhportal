@extends('layouts.admin_app')
@section('content')

<style>
    .card_box .white_box_tittle {
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
        border-bottom: 0px !important;
    }

    .hclass {
        min-height: 52px;
    }

    .card_box {
        /* border-radius: 0px !important; */
    }

    @media (max-width: 767px) {
        .hclass {
            min-height: auto;
        }
    }
    /* #cff3ff */
</style>

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-2 ">
        <!-- page title  -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">{{Auth::user()->roles[0]->name}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{Auth::user()->name}}</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                        <div class="page_date_button d-flex align-items-center">
                            {{-- <img src="{{asset('admin/assets/img/icon/calender_icon.svg')}} " alt="">
                            August 1, 2020 - August 31, 2020 --}}
                            {{-- @if (Session::has('Admin_id'))
                                <form action="{{route('user.backToAdmin')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Back to Admin</button>
                                </form>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <h4>Generates affiliate link to Customer</h4>
            </div>
            <div class="col-md-5 text-center mt-1">
                <input type="text" value="https://ezzyhportal.com/userform/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
            </div>
            <div class="col-md-1 text-center mt-1">
                <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy</a>
            </div>
            @if (Auth::user()->roles[0]->name == "Admin")
                <div class="col-md-3 mt-1 text-right">
                    <button type="button" class="btn btn-primary" id="sellerOpen">Seller Register</button>
                </div>
                <div class="col-md-3 mt-1">
                    <button type="button" class="btn btn-primary" id="dealerOpen">Dealer Register</button>
                </div>
            @endif
        </div>
    </div>
    <div class="modal" id="sellerModal">
        <div class="modal-dialog">
            <div class="modal-content" style="top:108px; z-index: 99999;">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Seller Register</h4>
                    <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-4">
            <div class="col-md-12">
                <h4>Generates affiliate link to Seller</h4>
            </div>
            <div class="col-md-6 text-center mt-1">
                <input type="text" value="https://ezzyhportal.com/sellerRegister/{{Auth::user()->id}}" id="myInput1" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
            </div>
            <div class="col-md-1 text-center mt-1">
                <a href="#" class="btn btn-primary" onclick="myFunctionCopy1()">Copy</a>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="dealerModal">
        <div class="modal-dialog">
            <div class="modal-content" style="top:108px; z-index: 99999;">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Dealer Register</h4>
                    <button type="button" class="close close2" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h4>Generates affiliate link to Dealer</h4>
                        </div>
                        <div class="col-md-6 text-center mt-1">
                            <input type="text" value="https://ezzyhportal.com/dealerRegister/{{Auth::user()->id}}" id="myInput2" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                        </div>
                        <div class="col-md-1 text-center mt-1">
                            <a href="#" class="btn btn-primary" onclick="myFunctionCopy2()">Copy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @if (Auth::user()->roles[0]->name == "Admin")
            
        {{-- <div class="row mb-4">
            <div class="col-md-12">
                <h4>Generates affiliate link to Seller</h4>
            </div>
            <div class="col-md-6 text-center mt-1">
                <input type="text" value="https://ezzyhportal.com/demo_git/sellerRegister/{{Auth::user()->id}}" id="myInput1" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
            </div>
            <div class="col-md-1 text-center mt-1">
                <a href="#" class="btn btn-primary" onclick="myFunctionCopy1()">Copy</a>
            </div>
        </div>

        
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>Generates affiliate link to Dealer</h4>
            </div>
            <div class="col-md-6 text-center mt-1">
                <input type="text" value="https://ezzyhportal.com/demo_git/dealerRegister/{{Auth::user()->id}}" id="myInput2" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
            </div>
            <div class="col-md-1 text-center mt-1">
                <a href="#" class="btn btn-primary" onclick="myFunctionCopy2()">Copy</a>
            </div>
        </div> --}}
        @endif

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">Customers</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row justify-content-end">
                                    <div class="col-lg-8 d-flex justify-content-end">
                                        <div class="serach_field-area theme_bg d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action ="{{ route('customer.index') }}" method="GET" role="search">
                                                    <div class="search_field">
                                                        <input type="text" name="search" placeholder="Search">
                                                    </div>
                                                    <button type="submit">
                                                         <img src="{{asset('admin/assets/img/icon/icon_search.svg')}}" alt="">
                                                   </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-6 mt_20">
                                <select class="nice_Select2 wide">
                                    <option value="1">View All</option>
                                    <option value="1">View A</option>
                                    <option value="1">View B</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body ">
                        {{-- @foreach ($alluser as $key => $user) --}}
                        @foreach ($alluser as $user)
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0">
                                    <img class="img-fluid radius_50" src="{{asset('admin/assets/img/dummy.jpg')}}" alt="">
                                </div>
                                <span class="f_s_14 f_w_400 text_color_11">{{ $user->fullname }}</span>
                            </div>
                            {{-- @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <div class="user_info">
                                {{ $v }}
                            </div>
                            @endforeach
                            @endif --}}
                            <div class="user_info">Customer</div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Sales of the last week</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="chart-currently"></div>
                        <div class="monthly_plan_wraper">
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/icon2/7.svg')}}" alt="">
                                    </div>
                                    <div>
                                        <h5>Most Sales</h5>
                                        <span>Authors with the best sales</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/icon2/6.svg')}}" alt="">
                                    </div>
                                    <div>
                                        <h5>Total sales lead</h5>
                                        <span>40% increased on week-to-week reports</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/icon2/5.svg')}}" alt="">
                                    </div>
                                    <div>
                                        <h5>Average Bestseller</h5>
                                        <span>Pitstop Email Marketing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30 overflow_hidden">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Sales Details</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body pb-0">
                        <div class="Sales_Details_plan">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{asset('admin/assets/img/icon2/3.svg')}}" alt="">
                                            </div>
                                            <div>
                                                <h5>$2,034</h5>
                                                <span>Author Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{asset('admin/assets/img/icon2/1.svg')}}" alt="">
                                            </div>
                                            <div>
                                                <h5>$706</h5>
                                                <span>Commision</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{asset('admin/assets/img/icon2/4.svg')}}" alt="">
                                            </div>
                                            <div>
                                                <h5>$49</h5>
                                                <span>Average Bid</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{asset('admin/assets/img/icon2/2.svg')}}" alt="">
                                            </div>
                                            <div>
                                                <h5>$5.8M</h5>
                                                <span>All Time Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart_wrap overflow_hidden">
                        <div id="chart4"></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-8 ">
                <div class="white_card mb_30 card_height_100">
                    <div class="white_card_header">
                        <div class="row align-items-center justify-content-between flex-wrap">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">Stoke Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 text-right d-flex justify-content-end">
                                <select class="nice_Select2 max-width-220">
                                    <option value="1">Show by month</option>
                                    <option value="1">Show by year</option>
                                    <option value="1">Show by day</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="management_bar"></div>
                    </div>
                </div>
            </div> --}}

            <!-- total diffrent kind of user show in this box  -->
            @if(Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin")
            <div class="col-xl-6">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/businessman.svg')}} " alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$subadmin}}</h4>
                                    <b>Subadmin</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/customer.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$dealer}}</h4>
                                    <b>Dealer</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/infographic.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$subdealer}}</h4>
                                    <b>Subdealer</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$seller}}</h4>
                                    <b>Seller</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$subseller}}</h4>
                                    <b>Subseller</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_4 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$customer}}</h4>
                                    <b>Customer</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="crm_reports_bnner">
                        <div class="row justify-content-end ">
                            <div class="col-lg-6">
                                <h4>Create CRM Reports</h4>
                                <p>Outlines keep you and honest
                                    indulging honest.</p>
                                <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @endif
            <!-- end for admin  -->
            <!-- start for dealer only  -->
            @if(Auth::user()->roles[0]->name == "dealer")
            <div class="col-xl-6 ">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/businessman.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$subdealer}}</h4>
                                    <p>Total Subdealer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/customer.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$customer}}</h4>
                                    <p>Total Customer</p>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/infographic.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>5</h4>
                                    <p>Self Pending Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>10</h4>
                                    <p>Self Approved Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>3</h4>
                                    <p>Subdealer Pending Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>3</h4>
                                    <p>Subdealer Approved Customer</p>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    {{-- <div class="crm_reports_bnner">
                        <div class="row justify-content-end ">
                            <div class="col-lg-6">
                                <h4>Create CRM Reports</h4>
                                <p>Outlines keep you and honest
                                    indulging honest.</p>
                                <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @endif
            <!-- end for dealer -->

            <!-- show to subdealer only start -->
            @if(Auth::user()->roles[0]->name == "subdealer")
            <div class="col-xl-6 ">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/customer.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$customer}}</h4>
                                    <p>Total Customer</p>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/businessman.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2</h4>
                                    <p>Self Pending Customer</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>10</h4>
                                    <p>Self Approved Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="crm_reports_bnner">
                            <div class="row justify-content-end ">
                                <div class="col-lg-6">
                                    <h4>Create CRM Reports</h4>
                                    <p>Outlines keep you and honest
                                        indulging honest.</p>
                                    <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endif
            <!-- end subdealer -->

            <!-- show to seller only start -->
            @if(Auth::user()->roles[0]->name == "seller")
            <div class="col-xl-6">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/businessman.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2</h4>
                                    <p>Self Pending Customer</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>10</h4>
                                    <p>Self Approved Customer</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>100</h4>
                                    <p>Total Product</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$subseller}}</h4>
                                    <b>Subseller</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/customer.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$customer}}</h4>
                                    <p>Total Customer</p>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="crm_reports_bnner">
                            <div class="row justify-content-end ">
                                <div class="col-lg-6">
                                    <h4>Create CRM Reports</h4>
                                    <p>Outlines keep you and honest
                                        indulging honest.</p>
                                    <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endif
            <!-- end seller -->

            <!-- show to subseller only start -->
            @if(Auth::user()->roles[0]->name == "subseller")
            <div class="col-xl-6">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/customer.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>{{$customer}}</h4>
                                    <p>Total Customer</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/businessman.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2</h4>
                                    <p>Self Pending Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>10</h4>
                                    <p>Self Approved Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="{{asset('admin/assets/img/crm/sqr.svg')}}" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>100</h4>
                                    <p>Total Product</p>
                                </div>
                            </div>
                        </div>
                        <div class="crm_reports_bnner">
                            <div class="row justify-content-end ">
                                <div class="col-lg-6">
                                    <h4>Create CRM Reports</h4>
                                    <p>Outlines keep you and honest
                                        indulging honest.</p>
                                    <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endif
            <!-- end seller -->


            <!-- <div class="col-lg-4">
                <div class="white_card card_height_100 mb_20 ">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Stoke Details</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body QA_section">
                        <div class="QA_table ">
                            <table class="table lms_table_active2 p-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Market Price</th>
                                        <th scope="col">Selling Price</th>
                                        <th scope="col">Total Unite</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_1.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_1">20</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_2.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_1">20</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_3.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_1">20</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_4.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="color_text_6">210</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_5.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_1">210</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_6.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_5">200</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_6.png" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                            </div>

                                        </td>
                                        <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                        <td class="f_s_12 f_w_400 color_text_6">$650</td>
                                        <td class="f_s_12 f_w_400 text-center"><a href="#" class="text_color_5">200</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            @if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin")
                <div class="col-xl-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Recent activity</h3>
                                </div>
                                <div class="header_more_tool">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                            <i class="ti-more-alt"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                            <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                            <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                            <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="Activity_timeline">
                                <ul>
                                    @if(!empty($activity))
                                    @foreach($activity as $act)
                                    <li>
                                        <div class="activity_bell"></div>
                                        <div class="timeLine_inner d-flex align-items-center">
                                            <div class="activity_wrap">
                                                <h6>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $act->created_at)->diffInMinutes(\Carbon\Carbon::now())}} min ago</h6>
                                                <p>{{$act->description}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif

                                    <!-- <li>
                                                <div class="activity_bell "></div>
                                                <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>5 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="activity_bell bell_lite"></div>
                                                <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>5 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="activity_bell bell_lite"></div>
                                                <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>5 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                                        </p>
                                                    </div>
                                                </div>
                                            </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Member request to mail.</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="thumb mb_30">
                            <img src="{{asset('admin/assets/img/table.svg')}}" alt="" class="img-fluid">
                        </div>
                        <div class="common_form">
                            <form action="{{route('admin.sendmail')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="common_input mb_15">
                                            <input type="text" name="fname" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="common_input mb_15">
                                            <input type="text" name="lname" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="common_input mb_15">
                                            <input type="text" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        @if(Auth::user()->roles[0]->name == "Admin")
                                        <select class="nice_Select2 nice_Select_line wide" name="role" required>
                                            <option value="1">Dealer</option>
                                            <option value="2">Subdealer</option>
                                            <option value="3">Seller</option>
                                            <option value="4">SubSeller</option>
                                            {{-- <option value="7">Staff</option> --}}
                                        </select>
                                        @elseif(Auth::user()->roles[0]->name == "dealer")
                                        <select class="nice_Select2 nice_Select_line wide" name="role" required>
                                            <!-- <option value="1">Dealer</option> -->
                                            <option value="2">Subdealer</option>
                                            <option value="5">Customer</option>
                                        </select>
                                        @elseif(Auth::user()->roles[0]->name == 'subseller')
                                        <select class="nice_Select2 nice_Select_line wide" name="role" required>
                                            <option value="5">Customer</option>
                                            <option value="6">Dropshipper</option>
                                        </select>
                                        @else
                                        <select class="nice_Select2 nice_Select_line wide" name="role" required>
                                            <option value="5">Customer</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <div class="create_report_btn mt_30">
                                            <button type="submit" class="btn_1 radius_btn d-block text-center">Send the invitation link</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @if(Auth::user()->roles[0]->name == "Admin")
            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">Stoke Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row justify-content-end">
                                    <div class="col-lg-8 d-flex justify-content-end">
                                        <div class="serach_field-area theme_bg d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search">
                                                    </div>
                                                    <button type="submit"> <img src="{{asset('admin/assets/img/icon/icon_search.svg')}}" alt=""> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="nice_Select2 wide">
                                            <option value="1">Show by All</option>
                                            <option value="1">Show by A</option>
                                            <option value="1">Show by B</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body ">
                        <div class="row min_height_oveflow">
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.pn')}}'" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="{{asset('admin/assets/img/customers/1.png')}}" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif --}}


        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#sellerOpen").click(function(){
            $("#sellerModal").show();
        });
        $(".close1").click(function(){
            $("#sellerModal").hide();
        })
        $("#dealerOpen").click(function(){
            $("#dealerModal").show();
        });
        $(".close2").click(function(){
            $("#dealerModal").hide();
        })
    });
</script>