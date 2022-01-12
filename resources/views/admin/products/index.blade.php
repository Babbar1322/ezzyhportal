@extends('layouts.admin_app')

@section('content')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
      /* bottom:5px; */
      top:3px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    .switch:after{
        display:none;
    }
</style>

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
                                    <form action="" class="mt-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                          <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                          </div>
                                        </div>
                                      </form>
                                    {{-- <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form action="" method="GET">
                                                <div class="search_field">
                                                    <input type="text" name="search" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="add_button ml-10">
                                        <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">search</a>
                                    </div> --}}
                                    @can('product-create')
                                        <div class="add_button ml-10">
                                            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
                                        </div>
                                    @endcan
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
                                            <th>Capacity</th>
                                            <th>Price</th>
                                            <th>Old Price</th>
                                            <!--<th>Description</th>-->
                                            <!-- <th>Details</th> -->
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($products))
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($products as $product)
                                        {{-- @php
                                            print_r($product->name);
                                            die;
                                        @endphp --}}

                                                {{-- @php
                                                    $sell_price = isset($product['seller_price']) && $product['seller_price'] != '' ? $product['seller_price'] : ''; 
                                                @endphp  --}}
                                        
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                <img src="{{ isset($product->image) ? asset('uploads/product/'.$product->image) : '' }}" class="rounded-circle ml-auto mr-auto" width="50">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td>{{ $product->capacity }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->oldprice }}</td>
                                                <!--<td>{{ $product->description }}</td>-->
                                                <!-- <td>{{ $product->detail }}</td> -->
                                                <td>
                                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="return confirm('Are You sure Want to delete')" class="d-flex">
                                                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                                        @can('product-edit')
                                                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('product-delete')
                                                        <button type="submit" class="btn btn-danger d-inline">Delete</button>
                                                        @endcan
                                                        @if ( Auth::user()->roles[0]->name == "seller")
                                                        <div class="">
                                                            <label class="switch">
                                                                
                                                                <input type="checkbox" class="showHide"  data-pid="{{$product->id}}" {{$product->status == 0 ? 'checked':''}} {{$product->status}} >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        {{-- <select class="nice_Select2 mr-2 showHide" data-pid="{{$product->id}}" >
                                                            <option value="1" {{(isset($product->status)&& $product->status==0) || empty($product) ? 'selected':''}}>On</option>
                                                            <option value="0" {{(isset($product->status) && $product->status==1)?'selected':''}}>Off</option>
                                                        </select> --}}
                                                        @endif
                                                    </form>

                                                </td>
                                            </tr>
                                            {{-- @endif --}}
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        @endif
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>

$(document).ready(function(){
$(".showHide").change(function(){
    var data = $(this).prop('checked');
    if(data == true){
        var status = 1;
    }
    else{
        var status = 0;
    }
  var pid = $(this).data("pid");
//   var status = $(this).val();
 
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': "{{csrf_token()}}"
      }
    });
    $.ajax({
      url:"{{route('product.showHide')}}",
      method:"post",
      data:{
        pid:pid,
        status:status
      },
      success:function(data){
        console.log(data);
      }
    });
});
});
</script>
  