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
                  <h4>Subdealer Users List</h4>
                  <div class="box_right d-flex lms_block">
                      <div class="row">
                          <div class="{{Auth::user()->roles[0]->name=='dealer'?'col-md-6':'col-md-12'}}">
                      <form action="" >
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                          </div>
                          <div class="col-md-6">
                              @if(Auth::user()->roles[0]->name == "dealer")<a class="btn btn-primary" href="{{ route('subdealer.create') }}"> Create New Subdealer</a>@endif
                          </div>
                      </div>
                  <!-- <a class="btn btn-primary" href="{{ route('subdealer.create') }}"> Create New Sub Dealer</a> -->
                </div>
              </div>

               {{-- <div class="row mb-4">
                <div class="col-md-12">
                  <h4 class="text-center">Generates affiliate link to Subdealer</h4>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center">
                  <input type="text" value="https://webcyst.com/ezzyhportal/subdealerRegister/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy</a>
                </div>
              </div>  --}}

              <!-- <div class="row mb-4">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center">
                  <input type="text" value="https://webcyst.com/ezzyhportal/userform/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy Affliate</a>
                </div>
              </div> -->

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
                        {{-- <th>No</th> --}}
                        <th>Log Code</th>
                        <th>Name</th> 
                        <th>Dealer Name</th>
                        <th>Dealer Code</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Registered Date</th>
                        <th style="min-width:400px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                      @php
                      $dealer = App\Models\User::role('dealer')->where("id",$user->spid)->first();
                      $dealer_name = isset($dealer)?$dealer->name:'';  $dealer_code = isset($dealer)?$dealer->login_code:'';

                      @endphp
                      <tr>
                        {{-- <td>{{ ++$i }}</td> --}}
                        <td>{{ $user->name }}</td>
                         <td>{{ $user->login_code }}</td>
                        <td>{{ $dealer_name }}</td>
                        <td>{{$dealer_code}}</td>
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
                        <td style="width: 44%;">
                            {{-- @if (empty($user->showPass)) --}}
                            <button type="button" data-id="{{$user->id}}" class="btn btn-secondary mybtn " >
                              Code
                            </button>
                          {{-- @endif --}}
                          <a class="btn btn-info" href="{{ route('subdealer.show',$user->id) }}">Show</a>
                          @can('subdealer-edit')
                              <a class="btn btn-primary" href="{{ route('subdealer.edit',$user->id) }}">Edit</a>
                          @endcan
                          @can('subdealer-delete')
                              {!! Form::open(['method' => 'DELETE','route' => ['subdealer.destroy', $user->id],'style'=>'display:inline',"onsubmit"=>"return confirm('Are You sure Want to delete')"]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!}
                          @endcan
                          <a class="btn btn-warning" href="{{ route('customer.index',["id"=>$user->id]) }}">Customer</a>
                          
                        </td>
                      </tr>
                      @endif
                      @endforeach

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