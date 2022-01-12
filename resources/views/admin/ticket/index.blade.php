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
                <h4>Submitted Tickets</h4>
                @if (Auth::user()->roles[0]->name != "Admin" || Auth::user()->roles[0]->name != "subadmin")
                <a href="{{route('admin.ticket')}}" class="btn btn-primary ml-auto">Create new ticket</a>
                @endif
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
                @if (session('success'))
                <div class="alert alert-success">
                  <p>{{ session('success') }}</p>
                </div>
                @endif

              <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Ticket Id</th>   
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $ticket)
                      <tr>
                        <td>#{{ $ticket->ticket_id }}</td>
                        <td>{{$ticket->status == 0?'Pending':'Closed'}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td><a href="{{route('admin.ticket',["id"=>$ticket->id])}}" class="btn btn-info">View Ticket</a>
                          <a href="{{route('ticket.delete',["id"=>$ticket->id])}}" class="btn btn-danger ml-2" onclick="return confirm('Are You sure want to delete!');">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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