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
                                <h4> Ticket Reply</h4>
                                {{-- <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href=""> Back</a>
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
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form action="{{route('ticket.storeReply',['id'=>$ticket->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>To User Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$ticket->user_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>To User Email:</strong>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$ticket->email}}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                   <div class="form-group">
                                       <strong>Subject:</strong>
                                       <input type="text" name="subject"  class="form-control" value="{{$ticket->subject}}" readonly>
                                   </div>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       <strong>Message:</strong>
                                       <textarea  id=""  rows="10"  class="form-control" readonly>{{$ticket->message}}</textarea>
                                   </div>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       <strong>Reply Message:</strong>
                                       <textarea name="message" id=""  rows="10" required class="form-control"></textarea>
                                   </div>
                               </div>
                               <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Upload File</strong>
                                    <input type="file" name="file"  id="file" class="form-control" accept=".jpg,.png,.jpeg,.doc,.pdf">
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
<script>
    var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 2097152){
       alert("File is too big!");
       this.value = "";
    };
};
</script>
@endsection