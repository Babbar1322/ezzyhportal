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
                <h4>Dealers Commission</h4>
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
                        <th>Dealer Name</th>
                        <th>Date</th>
                        <th>Commission</th>
                        <th>Bonus</th>
                        <th>Fine</th>
                        <th>Total</th>
                        <th>Action</th>
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
                               <td>{{count($com->dealer_name)>0?$com->dealer_name[0]:""}}</td>
                               <td>{{$com->created_at}}</td>
                               <td>{{$com->commission}}</td>
                               <td>{{$com->bonus}}</td>
                               <td>{{$com->fine}}</td>
<!--                               <td>{{$com->total ? $com->total : $com->commission - ($com->bonus + $com->fine)}}</td>-->
                               <td>{{$com->commission + $com->bonus + $com->fine}}</td>
                               <td>
                                 <a href="{{route('admin.dealerInvoice',["id"=>$com->id])}}" class="btn btn-primary">View Invoice</a>
                                 <a href="{{route('dealerInvoice.delete',['id'=>$com->id])}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete!');">Delete</a>
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