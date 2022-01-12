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
                                <h4>Update Setting</h4>
                                <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                                </div>
                            </div>


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                            <form action="{{route('front.updateText',['id'=>$setting->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$setting->name}}" required>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Value:</strong>
                                            <input type="text" name="value" class="form-control" placeholder="Value" value="{{$setting->value}}" required>
                                        </div>
                                    </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Image:</strong>
                                            <input type="file" name="image" class="form-control" >
                                            @if($setting->image != null)
                                            <img src="{{asset("/uploads/front/".$setting->image)}}" width="100">
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection