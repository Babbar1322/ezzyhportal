@extends('layouts.admin_app')
@section('content')

<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }


    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
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

                                <div class="row w-100">
                                    <div class="col-md-3">
                                        <h4> Customer List</h4>
                                    </div>
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                       
                                        <form action="" class="mt-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Search" name="search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    <div class="col-md-6" style="margin-top:-6px;">
                                        <form action="" class="d-flex" style="width: 96%;">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label class="m-0"> From Date</label>
                                                    <input type="date" class="form-control"  name="from_date" id="date" value="{{request()->from_date?request()->from_date:''}}">
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="m-0"> To Date</label>
                                                    <input type="date" class="form-control"  name="to_date" id="date1" value="{{request()->to_date?request()->to_date:''}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    
<!--                                    <div class="col-md-9 text-right">
                                        <form action="{{route('singleExport')}}" method="get" class="mt-3" >
                                            <input type="hidden" value="{{request()->search}}" name="search1">
                                            <input type="hidden" value="{{request()->loan_status}}" name="loan_status1">
                                            <input type="hidden" value="{{request()->from_date}}" name="date1">
                                            <input type="hidden" value="{{request()->to_date}}" name="date2">
                                            <input type="hidden" value="{{request()->role}}" name="role1">
                                            <input type="hidden" value="{{request()->sortDate}}" name="sdate">
                                            <input type="hidden" value="1" name="lid">
                                        <button type="submit" class="btn-info btn ">Export</button>
                                      </form>
                                    </div>-->
                                </div>

                                <!-- <div class="box_right d-flex lms_block">
                                  <a class="btn btn-primary" href="{{ route('dealer.create') }}"> Create New Customer</a>
                                </div> -->
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
                                                <th>NRIC NO.</th>
                                                <th>Name</th>
                                                {{-- <th>Gender</th> --}}
                                                <th>Email</th>
                                                {{-- <th>Refer By Id</th> --}}
                                                <th>Refer By Name</th>
                                                <th>Parent</th>
                                                {{-- <th>Occupation Type</th>
                                                    <th>Company Name</th> --}}
                                                <th style="min-width:150px;">Date</th>
                                                <th>Follow Up Review</th>
                                                <th>Loan Status</th>
                                                @if(Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == 'subadmin')

                                                <th>Status</th>
                                                <th>Document</th>
                                                <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($data))
                                            @php
                                            $i = 1;
                                            @endphp
                                            @foreach ($data as $user)
                                            @php
                                            $name = App\Models\User::where('id',$user->sid)->pluck('name');
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$user->ic_number}}</td>
                                                <td>{{$user->fullname}}</td>
                                                {{-- <td>{{$user->gender}}</td> --}}
                                                <td>{{$user->email}}</td>
                                                {{-- <td>{{$user->sid}}</td> --}}
                                                <td>{{$user->sponser_name ."(".$user->sponser_role.")"}}</td>
                                                <td>{{isset($user->dealer) && isset($user->dealer->name) ? $user->dealer->name : ""}}</td>
                                                {{-- <td>{{$user->occupation_type}}</td>
                                                <td>{{$user->company_name}} </td> --}}
                                                <td>{{$user->updated_at}}</td>
                                                <td>{{$user->follow_up}}</td>
                                                <td>
                                                    @if ($user->loan_status == 0)
                                                        <span class="text-warning">Processing</span>
                                                      @elseif($user->loan_status == 1)
                                                        <span class="text-success">Approved</span>
                                                      @elseif($user->loan_status == 3)
                                                      <span class="text-info">follow up</span>
                                                      @elseif($user->loan_status == -1)
                                                       <span class="text-info">Submitted</span>
                                                      @else
                                                        <span class="text-danger">Rejected</span>
                                                      @endif
                                                </td>
                                                </td>
                                                @if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == 'subadmin')

                                                <td class="d-flex">

                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                    <input type="hidden" name="loan_status" id="loanstus">
                                                    <select class="nice_Select2 wide updtstatus" data-id="{{$user->id}}">
                                                        <option value="0">Processing</option>
                                                        <option value="1">Approve</option>
                                                        <option value="2">Reject</option>
                                                        <option value="3">Follow Up</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.document', [$user->id])}}" class="btn btn-sm bg-success" target="_blank"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.deleteCustomer',['id'=>$user->id])}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')">Delete</a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            @else
                                            <div>No Data found</div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.updateLoanStatus')}}" method="post">
                @csrf
                <div class="modal-body">
                    <inputtype="hidden" value="3" name="loan_status">
                        <input type="hidden" name="id" id="loan_id">
                        <label for="">Message:</label>
                        <textarea name="follow_up" id="" rows="5" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // $('#sort').change(function(){
    //   $('#sortForm').submit();
    // });
    // $('#role').change(function(){
    //   $('#sortRole').submit();
    // });
    // $("#date").change(function(){
    //   $("#dateForm").submit();
    // });
    // $(".loanbtn").click(function(){
    //   var loan_id = $(this).data("loanid");
    //   $("#loan_id").val(loan_id);
    // });
    $(document).ready(function() {
        $(".updtstatus").change(function() {
            var loan_status = $(this).val();
            var id = $(this).data("id");
            $("#loanstus").val($(this).val());

            if ($(this).val() != 3) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });
                $.ajax({
                    url: "{{route('admin.updateLoanStatus')}}",
                    method: "post",
                    data: {
                        id: id,
                        loan_status: loan_status
                    },
                    success: function(data) {

                        console.log(data);
                        location.reload(true);
                    }
                });
            }
            if ($(this).val() == 3) {
                $("#loan_id").val($(this).attr("data-id"));
                $('#exampleModalCenter').modal({
                    show: true
                });
            }
        });
    });
</script>
@endsection