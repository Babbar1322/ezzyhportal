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
                <h4>Sub Seller List</h4>
                <div class="box_right d-flex lms_block"><div class="row"><div class="{{Auth::user()->roles[0]->name=='seller'?'col-md-6':'col-md-12'}}">
                  <form action="" >@isset(Request()->seller_id)<input type="hidden" name="seller_id" value="{{Request()->seller_id}}">@endisset
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form></div><div class="col-md-6">@if(Auth::user()->roles[0]->name == "seller")<a class="btn btn-primary" href="{{ route('subseller.create') }}"> Create New Subseller</a>@endif
</div></div>
                </div>
              </div>
              {{-- <div class="row mb-4">
                <div class="col-md-12">
                  <h4 class="text-center">Generates affiliate link to Subdealer</h4>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center">
                  <input type="text" value="https://ezzyhportal.com/sellerRegister/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy</a>
                </div>
              </div> --}}

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if (session('error'))
              <div class="alert alert-danger">
                <p>{{ session('error') }}</p>
              </div>
              @endif
              <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Log Code</th>
                        <th>Seller Name</th>
                        <th>Seller Code</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Registered Date</th>
                        <th style="{{Auth::user()->roles[0]->name=='Admin'? 'min-width:545px' : 'min-width:550px'}}">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (!empty($data))
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                      @php
                      $seller = App\Models\User::role('seller')->where("id",$user->spid)->first();
                      $seller_name = isset($seller)?$seller->name:'';
                       $seller_code = isset($seller)?$seller->login_code:'';

                      @endphp
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ isset($user->login_code) ? $user->login_code : "" }}</td>
                        <td>{{ $seller_name }}</td>
                        <td>{{isset($seller->login_code) ? $seller->login_code: ""}}</td>
                        <td>{{ $user->showPass }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          {{-- @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v) --}}
                          {{-- <label class="badge badge-success">{{ $v }}</label> --}}
                          <label class="badge badge-success">{{ $user->rlname }}</label>
                          {{-- @endforeach
                          @endif --}}
                        </td>
                        <td>{{$user->created_at}}</td>
                        <td style="width:44%">  <button type="button" data-id="{{$user->id}}" class="btn btn-secondary mybtn " >
                              Code
                            </button>
                          <a class="btn btn-info" href="{{ route('subseller.show',$user->id) }}">Show</a>
                          @can('subseller-edit')
                            <a class="btn btn-primary" href="{{ route('subseller.edit',$user->id) }}">Edit</a>
                          @endcan
                          @can('subseller-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['subseller.destroy', $user->id],'style'=>'display:inline',"onsubmit"=>"return confirm('Are You sure Want to delete')"]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          @endcan
                          <a class="btn btn-warning" href="{{ route('customer.index',["id"=>$user->id]) }}">Customer</a>
                          @if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'seller')
                            <a href="{{route('dropshippers.index',['id'=>$user->id])}}" class="btn btn-success">Dropshippers</a>
                          @endif
                          {{-- @if (Auth::user()->roles[0]->name == 'Admin')
                            <a href="{{route('subseller.commission')}}" class="btn btn-success">Send</a>
                          @endif  --}}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>

                {!! $data->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection