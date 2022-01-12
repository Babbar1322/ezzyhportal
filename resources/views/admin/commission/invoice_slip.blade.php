<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    <link rel="icon" href="{{asset('img/tab_icon.png')}}" type="image/png">
    <link href="{{asset('user/assets/css/bootstrapcdn.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/dealer.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('user/assets/js/poper.js')}}"></script>
    <script src="{{asset('user/assets/js/bootstrap.js')}}"></script>
    <title>Invoice Slip</title>
</head>
<body>
    <div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
    <div class="text-right">
        {{-- <button type="button"  class="btn btn-primary">Export </button> --}}
        <button type="button" id="print_page" class="btn btn-primary">Print </button>
    </div>
        </div>
    </div>
    
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
             @php
            	if(Request()->seller_id){
			$seller_id = Request()->seller_id;
				}
                else{
                    $seller_id = session('data');
                }
                 $data = \App\Models\commission::where('seller_id',$seller_id)->get();
                 $total = \App\Models\commission::where('seller_id',$seller_id)->sum('final_payment');
                 $seller = \App\Models\User::where('id',$seller_id)->first();
                 $i=1;
             @endphp
             <h5 class="text-center">MOBILEPEDIA</h5>
             <h5 class="text-center">CLAIM SUBMISSION LIST</h5>
             <h6 class="mb-4">COMPANY NAME : {{$seller->company_name}} <span style="font-weight:400;">Sale Submission For The Period Of:{{ \Carbon\Carbon::now()->toFormattedDateString()}}</span></h6>
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Seller Name </th>
                    <th>Customer Name</th>
                    <th>IC Number</th>
                    <th>Item</th>
                    <th>Finance Price(RM)</th>
                    <th>JCL Fee(RM)</th>
                    <th>Admin Fee(RM)</th>
                    <th>Final Cash Payment</th>
                </tr>  

            @if (!empty($data)) 
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$seller->name}}</td>
                <td>{{$item->customer_name}}</td>
                <td>{{$item->ic_number}}</td>
                <td>{{$item->item}}</td>
                <td>{{$item->finance_price}}</td>
                <td>{{$item->jcl_fee}}</td>
                <td>{{$item->admin_fee}}</td>
                <td>{{$item->final_payment}}</td>
                {{-- <td></td> --}}
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
            @endif
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h6>Total</h6></td>
                <td>@if(!empty($total)){{$total}}@endif</td>
            </tr>
            </table>

            <div class="mt-3">
                <div class="row">
                    <div class="col-md-5">
                        <h6>BANK NAME:<span style="font-weight:400;">{{$seller->bank_name}}</span></h6>
                    </div>
                    <div class="col-md-5">
                        <h6>BANK ACC NUMBER:<span style="font-weight:400;">{{$seller->bank_acc_no}}</span></h6>
                    </div>
                    {{-- <div class="col-md-5">
                        <h6>BANK DETAILS:<span style="font-weight:400;">CURRENT</span></h6>
                    </div>
                    <div class="col-md-5">
                        <h6>BANK ACC NUMBER:<span style="font-weight:400;">{{$seller->bank_acc_no}}</span></h6>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <h6>ACCOUNT HOLDER NAME:<span style="font-weight:400;">BILLYYEARN GLOBAL SDN BHD</span></h6>
                    </div>
                    <div class="col-md-5">
                        <h6>BENEFICIARY BANK:<span style="font-weight:400;">MAYBANK</span></h6>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#print_page').click(function(){
            $(this).hide();
             window.print();
             $.ajax({
            url:"{{route('commission.update')}}",
            method:'POST',
            success:function(data){
                console.log(data);
            }
        })
        });
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });

       
    });
</script>

</body>
</html>