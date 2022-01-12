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
                                <h4>Create Commission Slip</h4>
                                {{-- <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('seller.index') }}"> Back</a>
                                </div> --}}
                            </div>

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{route('store.commission')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <strong>Choose Dealer</strong>
                                        <select name="dealer_id" id="dealer_id" class="form-control selectpicker" data-live-search="true">
                                            @if (!empty($dealers))
                                                @foreach ($dealers as $dealer)
                                                <option value="{{$dealer->id}}" data-tokens="{{$dealer->login_code}}">{{$dealer->name}}({{$dealer->login_code}})</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <strong>Commission</strong>
                                        <input type="text" name="commission" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <strong>Bonus</strong>
                                        <input type="text" name="bonus" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <strong>Additional</strong>
                                        <input type="text" name="fine" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection