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
                                <h4>Upload Seller Banner</h4>
                                {{-- <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('seller.index') }}"> Back</a>
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
                    <div class="row">
                        <div class=" col-md-8">
                                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                    <div class="form-group">
                                        <strong>Upload Banner:</strong>
                                      <input type="file" name="banner">
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </form>
                                </div>
                    <div class="col-md-4">
                        <table class="table table-responsive">
                            <thead>
                                <th>Banner</th>
                            </thead>
                            <tbody>
                                @foreach ($bans as $ban)
                                <td><img src="{{asset('/uploads/banners/'.$ban->banner)}}" alt="" style="width:100px;"></td>
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

@endsection