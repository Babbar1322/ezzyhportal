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
                <h4>Sellers Commission</h4>
              </div>

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Seller Name</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Ic No.</th>
                        <th>Item</th>
                        <th>Finance Price</th>
                        <th>JCL Fee</th>
                        <th>Admin Fee</th>
                        <th>Final Payment</th>
                        <th style="min-width:230px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=1;
                      @endphp
                     @if (!empty($commission))
                         @foreach ($commission as $com)
                             <tr>
                               <td>{{$i}}</td>
                               <td>{{count($com->seller_name)>0?$com->seller_name[0]:""}}</td>
                               <td>{{$com->created_at}}</td>
                               <td>{{$com->customer_name}}</td>
                               <td>{{$com->ic_number}}</td>
                               <td>{{$com->item}}</td>
                               <td>{{$com->finance_price}}</td>
                               <td>{{$com->jcl_fee}}</td>
                               <td>{{$com->admin_fee}}</td>
                               <td>{{$com->final_payment}}</td>
                               <td>
                                 <a href="{{route('admin.sellerInvoice',['seller_id'=>$com->seller_id])}}" class="btn btn-primary">View Invoice</a>
                                 <a href="{{route('sellerInvoice.delete',['id'=>$com->id])}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete!');">Delete</a>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection