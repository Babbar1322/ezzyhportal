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
                                <h4>Capacities</h4>
                                {{-- <div class="box_right d-flex lms_block">
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
                                    @can('product-create')
                                        <div class="add_button ml-10">
                                            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
                                        </div>
                                    @endcan
                                </div> --}}
                            </div>

                            <div class="QA_table mb_30">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif --}}
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                         
                                            <!--<th>Description</th>-->
                                            <!-- <th>Details</th> -->
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($capacities))
                                        @php
                                            $i=0;
                                            @endphp
                                        @foreach ($capacities as $cap)
                                        {{-- @php
                                            print_r($product->name);
                                            die;
                                            @endphp --}}
                                            
                                            {{-- @php
                                                $sell_price = isset($product['seller_price']) && $product['seller_price'] != '' ? $product['seller_price'] : ''; 
                                                @endphp  --}}
                                        
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                <td>{{ $cap->name }}</td>
                                                <td>
                                                    <a href="{{route('capacity.delete',['id'=>$cap->id])}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')">Delete</a>
                                                </td>
                                            </tr>
                                            {{-- @endif --}}
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- {!! $brands->links() !!} --}}
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

  