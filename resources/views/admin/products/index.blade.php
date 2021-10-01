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
                                <h4>Products</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ml-10">
                                        <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">search</a>
                                    </div>
                                    <div class="add_button ml-10">
                                        <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table mb_30">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif


                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Old Price</th>
                                            <th>Description</th>
                                            <!-- <th>Details</th> -->
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                            <img src="{{ isset($product->image) ? asset('uploads/product/'.$product->image) : '' }}" class="rounded-circle ml-auto mr-auto" width="50">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->brand }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->oldprice }}</td>
                                            <td>{{ $product->description }}</td>
                                            <!-- <td>{{ $product->detail }}</td> -->
                                            <td>
                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                                    @can('product-edit')
                                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                                    @endcan


                                                    @csrf
                                                    @method('DELETE')
                                                    @can('product-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>


                                {!! $products->links() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection