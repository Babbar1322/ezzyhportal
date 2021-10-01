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
                  <a class="btn btn-primary" href="{{ route('subadmin.create') }}"> Create New Subadmin</a>
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
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                          @endif
                        </td>
                        <td>
                          <a class="btn btn-info" href="{{ route('subadmin.show',$user->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('subadmin.edit',$user->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['subadmin.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
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