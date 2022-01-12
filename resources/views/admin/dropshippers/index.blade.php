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
                <h4>DropShippers List</h4>
                <div class="box_right d-flex lms_block">
                  <div class="row">
                    <div class="col-md-6">
                      <form action="" >
                          @isset(Request()->id)
                            <input type="hidden" name="id" value="{{Request()->id}}">
                          @endisset
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search" name="search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-primary" href="{{ route('dropshipper.add') }}"> Create New Dropshipper</a>
                    </div>
                  </div>
                </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if (Session('error'))
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
                        <th>Name</th>
                        <th>Log Code</th>
                        <th>Password</th>
                        <th>Subseller Name</th>
                        <th>Subseller Code</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Registerd Date</th>
                        <th style="min-width:400px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                        @php
                        $subseller = App\Models\User::role('subseller')->where("id",$user->spid)->first();
                        $subseller_name = isset($subseller)?$subseller->name:'';
                        $subseller_code = isset($subseller)?$subseller->login_code:'';
                        @endphp
                      <tr>
                        {{-- <td>{{ ++$i }}</td> --}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->login_code }}</td>
                        <td>{{ $user->showPass }}</td>
                        <td>{{$subseller_name}}</td>
                        <td>{{$subseller_code}}</td>
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
                            
                        <td style="width:70%"> 
                            <button type="button" data-id="{{$user->id}}" class="btn btn-secondary mybtn " >
                              Code
                            </button>
                          <a class="btn btn-info" href="{{ route('dropshippers.show',$user->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('dropshippers.edit',$user->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['dropshippers.destroy', $user->id],'style'=>'display:inline',"onsubmit"=>"return confirm('Are You sure Want to delete')"]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          <a class="btn btn-warning" href="{{ route('customer.index',["id"=>$user->id]) }}">Customer</a>
                        
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