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
                                {{-- <h4>Reply on User Ticket</h4> --}}
                                <h4> User Ticket</h4>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
<!--                            <form action="{{route('ticket.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <input type="hidden" class="form-control" name="userid" value="{{Auth::user()->id}}">
                                    <input type="hidden" class="form-control" name="role" value="{{Auth::user()->roles[0]->name}}">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Message:</strong>
                                            <textarea name="message" id="" rows="10" required class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                        <div class="form-group">
                                            <strong>Upload File</strong>
                                            <input type="file" name="file" id="file" class="form-control" accept=".jpg,.png,.jpeg,.doc,.pdf">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>-->

                            @if (Auth::user()->roles[0]->name != 'subdealer' || Auth::user()->roles[0]->name != "subseller")
                            <form action="{{route('ticket.store')}}" method="POST" enctype="multipart/form-data" class="mb-3">
                                @csrf
                                <div class="row">
                                    <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" class="form-control" name="role" value="{{Auth::user()->roles[0]->name}}">

                                    <input type="hidden" class="form-control" name="ticketid" value="{{isset(Request()->id) ? Request()->id : ""}}">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Message:</strong>
                                            <textarea name="message" id="" rows="10" required class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                        <div class="form-group">
                                            <strong>Upload File</strong>
                                            <input type="file" name="file" id="file" class="form-control" accept=".jpg,.png,.jpeg,.doc,.pdf">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            @if(!empty($tickets))
                            @foreach ($tickets as $tckt)
                            
                            <div class="box_body mt-3 ">
                                <div class="default-according" id="accordion">
                                    <h6 class="text-success">{{isset($tckt->usrs) || !empty($tcket->usrs) ? $tckt->usrs->name ." (".$tckt->usrs->roles[0]->name.")":""}}</h6>
                                    <div class="card" style="background: #add8e626;">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="p-3 ">
                                                    <p class="text-danger">#{{$tckt->tick->ticket_id}}</p>
                                                    {{$tckt->message}}

                                                    <p class="text-primary mt-3">#{{$tckt->tick->created_at}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3">
                                                    @if(!empty($tckt->image))
                                                    <img src="{{asset('uploads/tickets/'.$tckt->image)}}" class="w-50" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // var uploadField = document.getElementById("file");
    // uploadField.onchange = function() {
    // if (this.files[0].size > 2097152) {
    // alert("File is too big!");
    // this.value = "";
    // };
    // };
</script>
@endsection