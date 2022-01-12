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
                <h4>Subadmin Users List</h4>
                <div class="box_right d-flex lms_block">
                  <div class="row">
                    <div class="col-md-6">
                      <form action="" method="GET">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search" name="search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-primary" href="{{ route('subadmin.create') }}"> Create New Subadmin</a>
                    </div>
                  </div>
                </div>
              </div>

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        {{-- <th>No</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Roles</th>
                        <th>Registered Date</th>
                        <th style="width:400px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     {{-- @php
                         print_r($data);
                         die;
                     @endphp --}}
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                      <tr>
                        {{-- <td>{{ ++$i }}</td> --}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{$user->showPass}}</td>
                        <td>
                          
                          {{-- @if(!empty($user->getRoleNames())) --}}
                          {{-- @foreach($user->getRoleNames() as $v) --}}
                          {{-- <label class="badge badge-success">{{ $v }}</label> --}}
                          <label class="badge badge-success">{{ $user->rlname }}</label>
                          {{-- @endforeach
                          @endif --}}
                        </td>
                        <td>{{$user->created_at}}</td>
                        <td>
                          <a class="btn btn-info" href="{{ route('subadmin.show',$user->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('subadmin.edit',$user->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['subadmin.destroy', $user->id],'style'=>'display:inline',"onsubmit"=>"return confirm('Are You sure Want to delete')"]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          {{-- <a href="{{route('user.impersonate',['id'=>$user->id])}}" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('imper-form').submit();" >Login</a>
                            <form id="imper-form" action="{{route('user.impersonate',['id'=>$user->id])}}" method="POST" style="display: none;" target="_blank">
                              @csrf
                            </form> --}}
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