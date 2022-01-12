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
                 @if (Auth::user()->roles[0]->name == 'subdealer' || Auth::user()->roles[0]->name == "subseller")
                      <h4> Ticket Messages</h4>
                  @else
                      <h4> Tickets</h4>
                  @endif
              </div>

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

       @if (Auth::user()->roles[0]->name != "Admin")
       <form action="{{route('ticket.store')}}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
            <div class="row">
                {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}" readonly>
                    </div>
                </div> --}}
                {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}" readonly>
                    </div>
                </div> --}}
                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" class="form-control" name="role" value="{{Auth::user()->roles[0]->name}}">
                @php
                    $user = \App\Models\User::where('id',Auth::user()->id)->first();
                @endphp
                <input type="hidden" class="form-control" name="to_userid" value="{{$user->spid}}">

                {{-- <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                  <div class="form-group">
                      <strong>Subject:</strong>
                      <input type="text" name="subject"  class="form-control" required>
                  </div>
              </div> --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Message:</strong>
                      <textarea name="message" id=""  rows="10" required class="form-control"></textarea>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Upload File</strong>
                    <input type="file" name="file"  id="file" class="form-control"  accept=".jpg,.png,.jpeg,.doc,.pdf" >
                </div>
            </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
  </form>
  @endif
@if (Auth::user()->roles[0]->name == "subseller" || Auth::user()->roles[0]->name == "subdealer")
        {{-- @foreach ($tickets as $tckt)
        <div class="box_body">
        <div class="default-according" id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne_{{$tckt->id}}" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-pencil pr-2"></i> By {{$tckt->user_name}}({{$tckt->usrs->roles[0]->name}})<span class="digits"></span></button>
            </h5>
          </div>
          <div class="collapse" id="collapseOne_{{$tckt->id}}" aria-labelledby="headingOne" data-parent="#accordion" style="">
            <div class="card-body">
              {{$tckt->message}}
            </div>
          </div>
        </div>
        </div>
        </div>
        @endforeach --}}
        @else
        {{-- {{Auth::user()->roles[0]->name}} --}}
        @if ( Auth::user()->roles[0]->name != "dropshipper" || Auth::user()->roles[0]->name != 'subseller' || Auth::user()->roles[0]->name != "subdealer")
        <h3> Ticket Requests</h3>
        <div class="QA_table mb_30">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($users))
                @foreach ($users as $user)
                @if ($user->usrs->roles[0]->name != 'Admin')
                <tr>
                  <td>{{$user->usrs->name}}</td>
                  <td><a href="{{route('admin.ticket',['id'=>$user->user_id])}}" class="btn btn-success">View Ticket</a></td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @endif
        @endif
       @endif
                          
              {{-- <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>From User Name</th>
                        <th>From User Email</th>
                        <th>Subject</th>
                        <th>Last Updated</th>
                        <th>Reply</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($reqs as $req)
                      @if(Auth::user()->roles[0]->name == 'Admin' && $req->role == 'seller' || Auth::user()->roles[0]->name == 'Admin' && $req->role == 'dealer' || Auth::user()->roles[0]->name == 'seller' && $req->role == 'subseller' || Auth::user()->roles[0]->name == 'dealer' && $req->role == 'subdealer')
                      <tr>
                        <td>{{$req->user_name}}</td>
                        <td>{{$req->email}}</td>
                        <td>{{$req->subject }}</td>
                        <td>{{$req->updated_at}}</td>
                        <td>
                          @if ($req->reply == null)
                          <a href="{{route('ticket.reply',['id'=>$req->id])}}" class="btn btn-info">Reply</a>
                            @else
                            <span class="text-success">Replied</span>
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection