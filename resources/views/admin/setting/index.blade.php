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
                                <h4>Settings</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
<!--                                        <div class="search_inner">
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>-->
                                    </div>
                                    <div class="add_button ml-10">
                                        <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">search</a>
                                    </div>
                                    
                                        <div class="add_button ml-10">
                                            <a class="btn btn-primary" href="{{ route('front.createText') }}"> Create New Setting</a>
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
                                            <th>Name</th>
                                            <th>Value</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($texts))
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach($texts as $txt)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$txt->name}}</td>
                                                <td>{{$txt->value}}</td>
                                                <td>
                                                        <a class="btn btn-primary" href="{{route('front.editText',['id'=>$txt->id])}}">Edit</a>
                                                        <a class="btn btn-danger" href="{{route('front.deleteText',['id'=>$txt->id])}}" onclick="return confirm('Are you sure want to delete');">Delete</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                </div>
<!--                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection