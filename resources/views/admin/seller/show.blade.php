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
                                <h4>Show Seller</h4>
                                <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('seller.index') }}"> Back</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $user->name }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Roles:</strong>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Login Code: </strong>
                                        {{ $user->login_code }}
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Contact: </strong>
                                        {{ $user->contact }}
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Bank Name: </strong>
                                        {{ $user->bank_name }}
                                    </div>
                                </div>
                                
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Bank Account: </strong>
                                        {{ $user->bank_acc_no }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Company Name: </strong>
                                        {{ $user->company_name }}
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection