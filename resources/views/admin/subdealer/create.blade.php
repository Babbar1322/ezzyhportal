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
                                <h4>Create New Sub Dealer</h4>
                                <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('subdealer.index') }}"> Back</a>
                                </div>
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

                            {!! Form::open(array('route' => 'subdealer.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                    @if(Auth::user()->roles[0]->name == 'Admin')
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                      @else
                                        <select class='form-control' name="roles[]" multiple>
                                            @if(!empty($roles))
                                                @foreach($roles as $role)
                                                    @if($role == 'subdealer')
                                                        <option value="{{$role}}">{{$role}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                      @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection