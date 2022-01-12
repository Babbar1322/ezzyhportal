<html>
    <head>
    <!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQmdfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
        <link rel="icon" href="{{asset('img/tab_icon.png')}}" type="image/png">
        <link href="{{asset('user/assets/css/bootstrapcdn.css')}}" rel="stylesheet" />
        <link href="{{asset('user/assets/dealer.css')}}" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('user/assets/js/poper.js')}}"></script>
        <script src="{{asset('user/assets/js/bootstrap.js')}}"></script>
        <style>
            .abs{
                position: absolute;
                bottom: 21px;
                text-transform: uppercase;
                left:-10px;
            }
            .inpt{
                border: 2px solid;
                padding: 4px;
                padding-left: 12px;
                width: 170px;
            }
        </style>
    </head>

    
    <!------ Include the above in your HEAD tag ---------->
    <body style="overflow-x: hidden;">
		<div class="row mt-3">
			<div class="col-md-12 text-right">
				<button type="button" id="print_page" class="btn btn-primary">Print </button>
			</div>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="invoice-title">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{-- <img src="{{asset('admin/assets/img/Mobilepedia.png')}}" alt="" style="width:100%;"> --}}
                                        <img src="{{asset('img/dealer_logo.png')}}" alt="" style="width:100%;">
                                    </div>
                                    <div class="col-md-9">
                                        <h1 class="abs">Commission Slip</h1>
                                    </div>
                                </div>

                            </div>
                            <div style="border-bottom:3px solid darkblue;"></div>
                            <div class="row">

                                <div class="col-md-6">
                                    <h4 style="color:darkblue;">MobliePedia Network</h4>
                                    <h6 style="color:rgb(152 149 149);">Address: 
                                        No.19, 
                                    </h6>
                                    <!--<h6 style="color:rgb(152 149 149);">{{isset($dealer[0]) && $dealer[0] != '' ? $dealer[0]['deal']['address'] : '' }}</h6>-->

                                    <h6 style="color:rgb(152 149 149);">Jalan Snuker 13/28, Shah Alam Selangor 40100</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h6 style="color:darkblue"><strong>{{ \Carbon\Carbon::now()->toFormattedDateString()}}</strong></h6>
                                    <h6 style="color:darkblue"><strong>Dealer Id:- {{isset($dealer[0]) && $dealer[0] != '' ? $dealer[0]['deal']['login_code'] : '' }}  </strong></h6>

                                </div>
                            </div>
                            <div style="border-bottom:3px solid darkblue;padding-bottom:10px;"></div>

                            <div class="row" >
                                <div class="col-md-6">
                                    <address class="pt-3">
                                        <strong style="text-transform: uppercase;">
                                            <h6><span style="color:darkblue;">Name:{{isset($dealer[0]) && $dealer[0] != '' ? $dealer[0]['deal']['name'] : '' }}</span></h6>
                                            <h6><span style="color:darkblue;">Bank:</span>{{isset($dealer[0]) && $dealer[0] != '' ? $dealer[0]['deal']['bank_name'] : '' }}</h6>
                                            <h6><span style="color:darkblue;">Account No. :</span>{{isset($dealer[0]) && $dealer[0] != '' ? $dealer[0]['deal']['bank_acc_no'] : '' }}</h6>
                                        </strong>
                                    </address>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div style="color:darkblue;padding-top:10px;">
                            Position
                        </div>
                        <div class="inpt">Dealer</div>
                    </div>
                    <div class="row" style="padding-top:40px;">
                        <div class="col-md-12">
                            <div class="panel panel-default" style="border:none;">

                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered">
                                            <thead>
                                                <tr>
                                                    <td><strong>No</strong></td>
                                                    <td class="text-center"><strong>Description</strong></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-right"><strong>Line Total</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($dealer))
                                                @foreach ($dealer as $item)
                                                <tr>
                                                    <td>1</td>
                                                    <td class="text-center">Commission</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-right">RM{{$item->commission}}</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td class="text-center">Bonus</td>
                                                    <td class="text-center"></td>
                                                    <!--<td class="text-right">${{$item->bonus}}</td>-->
                                                    <td class="text-right">RM{{$item->bonus}}</td>

                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td class="text-center">Additional</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-right">RM{{$item->fine}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Total</strong></td>
                                                    <!--<td class="no-line text-right">${{$item->total?$item->total:$item->commission - ($item->bonus + $item->fine) }}</td>-->
                                                    <td class="no-line text-right">RM{{$item->commission + $item->bonus + $item->fine  }}</td>

                                                </tr>
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
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
	<script>
		 $(document).ready(function(){
        $('#print_page').click(function(){
            $(this).hide();
             window.print();
		});
	});
	</script>
</html>