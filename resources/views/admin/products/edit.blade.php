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
                                <h4>Edit Product</h4>
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


                            <form action="{{ route('products.update',$product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="userid" value="{{Auth::user()->id}}" />
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Brand:</strong>
                                            <input type="text" name="brand" value="{{ $product->brand }}" class="form-control" placeholder="Brand">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Image:</strong>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Price:</strong>
                                            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Old Price:</strong>
                                            <input type="text" name="oldprice" value="{{ $product->oldprice }}" class="form-control" placeholder="Old Price">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <textarea class="form-control"  style="height:150px" name="description" placeholder="Description"> {{ $product->description }}</textarea>
                                        </div>
                                    </div>


                                    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Detail:</strong>
                                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                                        </div>
                                    </div> -->
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