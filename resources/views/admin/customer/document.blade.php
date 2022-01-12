@extends('layouts.admin_app')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4> Customer Document</h4>
                            </div>

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif


                            @foreach ($data as $key => $user)
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p><b>Full Name: {{$user->fullname}}</b></p>
                                        <p><b>RACE/BANGSA: {{$user->race}}</b></p>
                                        <p><b>NRIC No: {{$user->ic_number}}</b></p>
                                        <p><b>Sex/Jantina: {{$user->gender}}</b></p>
                                        <p><b>Housing Status: {{$user->status}}</b></p>
                                        <p><b>Martial Status: {{$user->martial}}</b></p>
                                        <p><b>Bank: {{$user->bank}}</b></p>
                                        <p><b>Account Type: {{$user->account}}</b></p>
                                        <p><b>Account No: {{$user->account_no}}</b></p>
                                        <p><b>Account Holder: {{$user->account_name}}</b></p>
                                        <p><b>Email: {{$user->email}}</b></p>
                                        <p><b>Hanphone: {{$user->hanphone_no}}</b></p>
                                        <p><b>Address1: {{$user->address1}}</b></p>
                                        <p><b>Address2: {{$user->address2}}</b></p>
                                    </div>
                                    <div class="col-md-3">
                                         <p><b>Postcode: {{$user->postcode}}</b></p>
                                        <p><b>City: {{$user->city}}</b></p>
                                        <p><b>State: {{$user->state}}</b></p>
                                        <p><b>Length of Stay: {{$user->length}}</b></p>
                                        <p><b>Best Time to Call: {{$user->call1}}</b></p>
                                        <p><b>ECP1_Relationship: {{$user->relationship}}</b></p>
                                        <p><b>ECP1_name: {{$user->ecp1_name}}</b></p>
                                        <p><b>ECP1_Address1: {{$user->ecp1_add1}}</b></p>
                                        <p><b>ECP1_address2: {{$user->ecp1_add2}}</b></p>
                                        <p><b>ECP1_Postcode: {{$user->ecp1_post}}</b></p>
                                        <p><b>ECP1_Hanphone: {{$user->ecp1_phone}}</b></p>
                                        
                                    </div>
                                     <div class="col-md-3">
                                         <p><b>ECP1_City: {{$user->ecp1_city}}</b></p>
                                        <p><b>ECP1_State: {{$user->ecp1_state}}</b></p>
                                        <p><b>ECP1_CallTime: {{$user->ecp1_call}}</b></p>
                                        <p><b>ECP2_Relationship: {{$user->ecp2_rel}}</b></p>
                                        <p><b>ECP2_name: {{$user->ecp2_name}}</b></p>
                                        <p><b>ECP2_Address1: {{$user->ecp2_add}}</b></p>
                                        <p><b>ECP2_address2: {{$user->ecp2_add2}}</b></p>
                                        <p><b>ECP2_Postcode: {{$user->ecp2_post}}</b></p>
                                        <p><b>ECP2_Hanphone: {{$user->ecp2_phone}}</b></p>
                                        <p><b>ECP2_City: {{$user->ecp2_city}}</b></p>
                                        <p><b>ECP2_State: {{$user->ecp2_state}}</b></p>
                                        <p><b>ECP2_CallTime: {{$user->ecp2_call}}</b></p>
                                         <p><b>Nature of Work: {{$user->nature}}</b></p>
                                        <p><b>Year of Service: {{$user->service_year}}</b></p>
                                    </div>
                                     <div class="col-md-3">
                                        <p><b>Salary Date: {{$user->salary_date}}</b></p>
                                        <p><b>Salary: {{$user->salary}}</b></p>
                                        <p><b>Employee Status: {{$user->employment}}</b></p>
                                        <p><b>Company: {{$user->company_name}}</b></p>
                                        <p><b>Company Address: {{$user->company_address}}</b></p>
                                        <p><b>Company Postcode: {{$user->company_postcode}}</b></p>
                                        <p><b>Company City: {{$user->company_city}}</b></p>
                                        <p><b>Company State: {{$user->company_state}}</b></p>
                                        <p><b>Office Number: {{$user->office_no}}</b></p>
                                        <p><b>Brand: {{$user->brand}}</b></p>
                                        <p><b>Model: {{$user->model}}</b></p>
                                        <p><b>Capacity: {{$user->capacity}}</b></p>
                                        <p><b>Loan Tenure: {{$user->loan_tenur}} </b></p>
                                        <p><b>Protect Plan: {{$user->loan}}</b></p>
                                        <p><b>Remarks: {{$user->remarks}}</b></p>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-4 mt-1">
                                        @if(!empty($user->nric_front))
                                            {{--@if(substr($user->nric_front,-3) == "pdf")--}}
                                               {{-- <a class="btn btn-danger" href="{{asset('uploads/front/'.$user->nric_front)}}" download><i class="ti-download pr-2"></i>{{$user->nric_front}}</a> --}}
                                               <a class="btn btn-danger" href="{{asset('storage/front/'.$user->nric_front)}}" download><i class="ti-download pr-2"></i>{{$user->nric_front}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/front/'.$user->nric_front)}}" class="w-100" onerror="this.style.display='none'"/> --}}
                                                <img src="{{asset('storage/front/'.$user->nric_front)}}" class="w-100" onerror="this.style.display='none'"/>
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                    <div class="col-md-4  mt-1">
                                        @if(!empty($user->nric_back))
                                           {{--@if(substr($user->nric_back,-3) == "pdf")--}}
                                                {{-- <a class="btn btn-danger" href="{{asset('uploads/back/'.$user->nric_back)}}" download><i class="ti-download pr-2"></i>{{$user->nric_back}}</a> --}}
                                                <a class="btn btn-danger" href="{{asset('storage/back/'.$user->nric_back)}}" download><i class="ti-download pr-2"></i>{{$user->nric_back}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/back/'.$user->nric_back)}}" class="w-100" onerror="this.style.display='none'" /> --}}
                                                <img src="{{asset('storage/back/'.$user->nric_back)}}" class="w-100" onerror="this.style.display='none'" />
                                             {{--@endif--}}   
                                        @endif
                                    </div>
                                    <div class="col-md-4  mt-1">
                                        @if(!empty($user->pay_slip))
                                            {{--@if(substr($user->pay_slip,-3) == "pdf")--}}
                                               {{-- <a class="btn btn-danger" href="{{asset('uploads/slip/'.$user->pay_slip)}}" download><i class="ti-download pr-2"></i>{{$user->pay_slip}}</a> --}}
                                               <a class="btn btn-danger" href="{{asset('storage/slip/'.$user->pay_slip)}}" download><i class="ti-download pr-2"></i>{{$user->pay_slip}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/slip/'.$user->pay_slip)}}" class="w-100" onerror="this.style.display='none'" /> --}}
                                                <img src="{{asset('storage/slip/'.$user->pay_slip)}}" class="w-100" onerror="this.style.display='none'" />
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                    <div class="col-md-4  mt-1">
                                        @if(!empty($user->pay_bil))
                                            {{--@if(substr($user->pay_bil,-3) == "pdf")--}}
                                               {{-- <a class="btn btn-danger" href="{{asset('uploads/bill/'.$user->pay_bil)}}" download><i class="ti-download pr-2"></i>{{$user->pay_bil}}</a> --}}
                                               <a class="btn btn-danger" href="{{asset('storage/bill/'.$user->pay_bil)}}" download><i class="ti-download pr-2"></i>{{$user->pay_bil}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/bill/'.$user->pay_bil)}}" class="w-100"  onerror="this.style.display='none'"/> --}}
                                                <img src="{{asset('storage/bill/'.$user->pay_bil)}}" class="w-100"  onerror="this.style.display='none'"/>
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                    <div class="col-md-4  mt-1">
                                        @if(!empty($user->bank_statement))
                                            {{--@if(substr($user->bank_statement,-3) == "pdf")--}}
                                               {{-- <a class="btn btn-danger" href="{{asset('uploads/bank/'.$user->bank_statement)}}" download><i class="ti-download pr-2"></i>{{$user->bank_statement}}</a> --}}
                                               <a class="btn btn-danger" href="{{asset('storage/bank/'.$user->bank_statement)}}" download><i class="ti-download pr-2"></i>{{$user->bank_statement}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/bank/'.$user->bank_statement)}}" class="w-100"  onerror="this.style.display='none'"/> --}}
                                                <img src="{{asset('storage/bank/'.$user->bank_statement)}}" class="w-100"  onerror="this.style.display='none'"/>
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                    <div class="col-md-4  mt-1">
                                        @if(!empty($user->ssm))
                                            {{--@if(substr($user->ssm,-3) == "pdf")--}}
                                               <a class="btn btn-danger" href="{{asset('storage/ssm/'.$user->ssm)}}" download><i class="ti-download pr-2"></i>{{$user->nric_back}}</a>
                                            {{--@else--}}
                                                {{-- <img src="{{asset('uploads/ssm/'.$user->ssm)}}" class="w-100" onerror="this.style.display='none'" /> --}}
                                                <img src="{{asset('storage/ssm/'.$user->ssm)}}" class="w-100" onerror="this.style.display='none'" />
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                </div>
                            </div>


                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection