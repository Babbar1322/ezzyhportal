@extends('layouts.admin_app')
@section('content')

<style>
    .errcstmr{
        color:red;
    }
</style>
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif 
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Send Commission To Seller</h4>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <form action="{{route('commission.store')}}" method="post">
                            @csrf
                            <input id="init_id" value="0" type="hidden" >
                           <div class="appends" >
                               <div class="errcstmr"></div>
                            <div class="row" >
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <strong>Choose Seller</strong>
                                        <select name="seller" id="seller" class="form-control selectpicker" data-live-search="true">
                                        @if(!empty($sellers))
                                            <option readonly>Choose Seller</option>
                                            @foreach ($sellers as $seller)
                                                <option value="{{$seller->id}}" data-tokens="{{$seller->login_code}}"> {{$seller->name}}({{$seller->login_code}})</option> 
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="apnd" class="d-none">
                                <div id="id0">
                            <div class="row" >
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong> NRIC Number</strong>
                                        <input type="text" class="form-control" name="ic_no[]">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>Customer Name:</strong>
                                        <input type="text" class="form-control" name="customer[]">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>Item</strong>
                                        <input type="text" class="form-control" name="item[]" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>Finance Price:</strong>
                                        <input type="text" class="form-control fp" onchange="calculatefp('id0')" name="price[]" id="price_1 fpid0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>JCL Fee:</strong>
                                        <input type="text" class="form-control jclfee" onchange="calculatefp('id0')" name="jcl_fee[]" id="jcl_1 jclfeeid0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>Admin Fee:</strong>
                                        <input type="text" class="form-control adminfe" onchange="calculatefp('id0')" name="admin_fee[]" id="admin_1 adminfeid0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <strong>Final Payment:</strong>
                                        <input type="text" class="form-control finalpr" name="final_fee[]" id="final_1 finalprid0">
                                    </div>
                                </div>
                            </div>
                                     </div>
                            </div>
                           </div>
                            <button type="button" class="btn btn-success mb-3 d-none" id="more">Add More</button>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" id="apnd">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   function calculatefp(a){
        var price = $("#"+a+" .fp").val();
        var val = $("#"+a+" .adminfe").val(); 
        var val1 = $("#"+a+" .jclfee").val(); 
        var total = (+price)-(+val)-(+val1);

    //     var price = $("#"+a+" #fp"+a).val();
    //     var val = $("#"+a+" #adminfe"+a).val(); 
    //     var val1 = $("#"+a+" #jclfee"+a).val(); 
    //     var total = (+price)-(+val)-(+val1);
    //    $(".fp"+a).attr("id","fp"+a);
    //    $(".adminfe"+a).attr("id","adminfe"+a);
    //    $(".jclfee"+a).attr("id","jclfee"+a); 
    //    $(".finalpr"+a).attr("id","finalpr"+a); 

       console.log("price"+price);
       console.log("val"+val);
       console.log("val1"+val1);
       console.log("total"+total);
         $("#"+a+" .finalpr").val(total); 

    }
    
    $(document).ready(function(){
        $("#apnd , #more").hide();
       var rows = $("#apnd").html();
       $("#more").click(function(){ 
            var init_id = $("#init_id").val();
            var no = 1;
            var init_id1 = (+init_id)+(+no);
            $("#init_id").val(init_id1);
            var id=$("#init_id").val();
//            alert("#price_"+id);
//            alert($("input[name='price[]']").val());
           var opts = $(".appends").html();
           $(".ic_no").find('option').remove();
           $(".ic_no").append(opts);
//           alert(init_id1);
           rows = rows.replace("calculatefp('id0')","calculatefp('id"+init_id1+"')");
//           rows = rows.replace("fp","fp1");
           
           $("#apnd").append("<div id='id"+init_id1+"'>"+rows+"</div>");          
       });

        
        

       $("#seller").change(function(){
           var seller_id = $(this).val();
           $.ajax({
                url:"{{route('seller.commission')}}",
                method:'GET',
                data:{
                    seller_id:seller_id
                },
                success:function(data){
                    console.log(data);
                    $(".ic_no").find('option').remove();
                    if(data.customers.length > 0){
                        $(".errcstmr").hide();
                        $("#apnd,#more").show();
                        $("#apnd , #more").removeClass("d-none");
                        for(var i=0;i<data.customers.length;i++){
                            $(".ic_no").append("<option value='"+data.customers[i].ic_number+"'>"+data.customers[i].ic_number+"</option>");
                        }
                    }
                    else{
                        $(".errcstmr").show();
                        $(".errcstmr").text("This seller has no customer");
                        $("#apnd,#more").hide();
                        $(".ic_no").find('option').remove();
                    }
                }
           });
       });
   



    });
</script>

@endsection