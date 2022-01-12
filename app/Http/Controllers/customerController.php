<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Models\user_form;
use App\Models\logController;
use App\Models\notification;
use App\Models\notify;
use Auth;
use App\Exports\UsersExport;
use App\Exports\singleUserExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class customerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request) {
        if ($request->role != "" && $request->loan_status != "" && $request->from_date != "" && $request->to_date != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy('updated_at', $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy('updated_at', $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "loan_status" => $request->loan_status, "role" => $request->role, "from_date" => $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->role != "" && $request->loan_status != "" && $request->from_date != "" && $request->to_date != "") {
            $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->paginate(5);
            $data->appends(["from_date" => $request->from_date, "to_date" => $request->to_date, "role" => $request->role, "loan_status" => $request->loan_status]);
        } elseif ($request->role != "" && $request->loan_status != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->orderBy('updated_at', $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->orderBy('updated_at', $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "loan_status" => $request->loan_status, "role" => $request->role]);
        } elseif ($request->role != "" && $request->from_date != "" && $request->to_date != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('sponser_role', $request->role)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("updated_at", $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('sponser_role', $request->role)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("updated_at", $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "role" => $request->role, "from_date" => $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->loan_status != "" && $request->from_date != "" && $request->to_date != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("updated_at", $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("updated_at", $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "loan_status" => $request->loan_status, "from_date" => $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->role != "" && $request->loan_status != "") {
            $data = user_form::where('sponser_role', $request->role)->where('loanstatustype', $request->loan_status)->paginate(5);
            $data->appends(["loan_status" => $request->loan_status, "role" => $request->role]);
        } elseif ($request->role != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('sponser_role', $request->role)->orderBy('updated_at', $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('sponser_role', $request->role)->orderBy('updated_at', $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "role" => $request->role]);
        } elseif ($request->loan_status != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('loanstatustype', $request->loan_status)->orderBy("updated_at", $request->sortDate)->paginate(5);
            } else {
                $data = user_form::where('loanstatustype', $request->loan_status)->orderBy("updated_at", $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "loan_status" => $request->loan_status]);
        } elseif ($request->from_date != "" && $request->to_date != "" && $request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy('updated_at', $request->sortDate)->paginate(5);
            } else {
                $data = user_form::whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy('updated_at', $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate, "from_date" => $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->loan_status != "" && $request->from_date != "" && $request->to_date != "") {
            $data = user_form::where('loanstatustype', $request->loan_status)->whereBetween('updated_at', [$request->from_date, $request->to_date])->paginate(5);
            $data->appends(["from_date" => $request->from_date, "to_date" => $request->to_date, "loan_status" => $request->loan_status]);
        } elseif ($request->role != "" && $request->from_date != "" && $request->to_date != "") {
            $data = user_form::where('sponser_role', $request->role)->whereBetween('updated_at', [$request->from_date, $request->to_date])->paginate(5);
            $data->appends(["role" => $request->role, "from_date" => $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->sortDate != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::orderBy("updated_at", $request->sortDate)->paginate(5);
            } else {
                $data = user_form::orderBy("updated_at", $request->sortDate)->where('sid', Auth::user()->id)->paginate(5);
            }
            $data->appends(["sortDate" => $request->sortDate]);
        } elseif ($request->search != "") {

            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $search = $request->search;
                if (isset($request->id)) {
                    $data = user_form::where('sid',$request->id)->where(function($q) use($search) {
                    $q->where('ic_number', 'like', '%' . $search . '%')->orWhere('loanstatustype', 'like', '%' . $search . '%')->orWhere('fullname', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->orWhere('sponser_name', 'like', '%' . $search . '%')->orWhere('sponser_role', 'like', '%' . $search . '%')->orWhere('company_name', 'like', '%' . $search . '%');})->paginate(5);
                }else{
                    $data = user_form::where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%')->paginate(5);
                }
                    $data->appends(["search"=>$request->search]);
                
            } else {
//                $data = user_form::where('sid',Auth::user()->id)->where(function ($q){ $q->where('ic_number','like','%'.$q->search.'%')->orWhere('loanstatustype','like','%'.$q->search.'%')->orWhere('fullname','like','%'.$q->search.'%')->orWhere('email','like','%'.$q->search.'%')->orWhere('sponser_name','like','%'.$q->search.'%')->orWhere('sponser_role','like','%'.$q->search.'%')->orWhere('company_name','like','%'.$q->search.'%');})->paginate(5);
//                print_r("select * from user_forms where dealer_code=".Auth::user()->id." and ic_number Like '%".$request->search."%' or loanstatustype Like '%".$request->search."%' or fullname Like '%".$request->search."%' or email Like '%".$request->search."%' or sponser_name Like '%".$request->search."%' or sponser_role Like '%".$request->search."%' or company_name Like '%".$request->search."%' order by id desc");
//                die;
                $data = DB::select("select * from user_forms where dealer_code=" . Auth::user()->id . " and (ic_number Like '%" . $request->search . "%' or loanstatustype Like '%" . $request->search . "%' or fullname Like '%" . $request->search . "%' or email Like '%" . $request->search . "%' or sponser_name Like '%" . $request->search . "%' or sponser_role Like '%" . $request->search . "%' or company_name Like '%" . $request->search . "%')order by id desc");

//                $data->appends(["search",$data]);
                $total = count($data);
                $per_page = 20;
                $current_page = $request->input("page") ?? 1;
                $starting_point = ($current_page * $per_page) - $per_page;
                $data = array_slice($data, $starting_point, $per_page, true);
                $data = new Paginator($data, $total, $per_page, $current_page, [
                    'path' => $request->url(),
                    'query' => $request->query(),
                ]);
            }
        } elseif ($request->from_date != "" && $request->to_date != "") {
            $data = user_form::whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("id", "desc")->paginate(5);
            $data->appends(["from_date"=> $request->from_date, "to_date" => $request->to_date]);
        } elseif ($request->role != "") {
            $data = user_form::where('sponser_role', $request->role)->orderBy("id", "desc")->paginate(5);
            $data->appends(["role"=> $request->role]);
        } elseif ($request->loan_status != "") {
            if (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
                $data = user_form::where('loanstatustype', $request->loan_status)->orderBy("id", "desc")->paginate(5);
            } else {
                $data = user_form::where('loanstatustype', $request->loan_status)->where('sid', Auth::user()->id)->orderBy("id", "desc")->paginate(5);
            }
            $data->appends(["loan_status"=> $request->loan_status]);
        } elseif ($request->id != "") {
            $data = user_form::where("sid", $request->id)->orderBy("id", "desc")->paginate(5);
        } elseif (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {
            $data = user_form::orderBy("id", "desc")->paginate(5);
        } else {
            $data = user_form::where('sid', Auth::user()->id)->orderBy("id", "desc")->paginate(5);
        }
       $data->map(function($a){
           $a->dealer = User::where('id',$a->pid)->first();
           return $a;
       });
       
       
        // $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.customer.index', compact('data'));
        // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.customer.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('customer.index')
                        ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        return view('admin.customer.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = user_form::find($id);
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.customer.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'password' => 'same:confirm-password',
        //     'roles' => 'required'
        // ]);
        // $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));    
        // }
        // $user = User::find($id);
        // $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();
        // $user->assignRole($request->input('roles'));

        $imgs = user_form::where('id', $id)->first();
        $frontimg = $imgs->nric_front;
        $backimg = $imgs->nric_back;
        $slipimg = $imgs->pay_slip;
        $bilimg = $imgs->pay_bil;
        $bankimg = $imgs->bank_statement;
        $ssmimg = $imgs->ssm;

        if ($file = $request->hasFile('nric_front')) {
            $file = $request->file('nric_front');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/front'), $filename);
            $frontimg = $filename;
        }
        if ($file = $request->hasFile('nric_back')) {
            $file = $request->file('nric_back');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/back'), $filename);
            $backimg = $filename;
        }
        if ($file = $request->hasFile('pay_slip')) {
            $file = $request->file('pay_slip');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/slip'), $filename);
            $slipimg = $filename;
        }
        if ($file = $request->hasFile('pay_bil')) {
            $file = $request->file('pay_bil');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/bill'), $filename);
            $bilimg = $filename;
        }
        if ($file = $request->hasFile('bank_statement')) {
            $file = $request->file('bank_statement');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/bank'), $filename);
            $bankimg = $filename;
        }
        if ($file = $request->hasFile('ssm')) {
            $file = $request->file('ssm');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/uploads/ssm'), $filename);
            $ssmimg = $filename;
        }


        $cstm = user_form::where('id', $id)->update([
            "fullname" => $request->fullname,
            "ecp1_name" => $request->ecp1_name,
            "ecp1_add1" => $request->ecp1_add1,
            "ecp1_add2" => $request->ecp1_add2,
            "ecp1_post" => $request->ecp1_post,
            "ecp1_city" => $request->ecp1_city,
            "ecp1_state" => $request->ecp1_state,
            "ecp1_phone" => $request->ecp1_phone,
            "ecp1_call" => $request->ecp1_call,
            "ecp2_name" => $request->ecp2_name,
            "ecp2_rel" => $request->ecp2_rel,
            "ecp2_add" => $request->ecp2_add,
            "ecp2_add2" => $request->ecp2_add2,
            "ecp2_post" => $request->ecp2_post,
            "ecp2_city" => $request->ecp2_city,
            "ecp2_state" => $request->ecp2_state,
            "ecp2_phone" => $request->ecp2_phone,
            "ecp2_call" => $request->ecp2_call,
            "race" => $request->race,
            "ic_number" => $request->ic_number,
            "gender" => $request->gender,
            "status" => $request->STATUS,
            "martial" => $request->MARTIAL,
            "bank" => $request->BANK,
            "account" => $request->ACCOUNT,
            "account_no" => $request->account_no,
            "account_name" => $request->account_name,
            "email" => $request->email,
            "hanphone_no" => $request->hanphone_no,
            "address1" => $request->address1,
            "address2" => $request->address2,
            "postcode" => $request->postcode,
            "city" => $request->city,
            "state" => $request->state,
            "length" => $request->LENGTH,
            "call1" => $request->CALL,
            "relationship" => $request->RELATIONSHIP,
            "occupation_type" => $request->occupation_type,
            "nature" => $request->NATURE,
            "service_year" => $request->service_year,
            "salary_date" => $request->salary_date,
            "salary" => $request->salary,
            "employment" => $request->EMPLOYMENT,
            "company_name" => $request->company_name,
            "company_address" => $request->company_address,
            "company_postcode" => $request->company_postcode,
            "company_state" => $request->company_state,
            "company_city" => $request->company_city,
            "office_no" => $request->office_no,
            "document" => $request->document,
            "brand" => $request->BRAND,
            "model" => $request->MODEL,
            "capacity" => $request->CAPACITY,
            "loan" => $request->LOAN,
            "loan_tenur" => $request->loan_tenur,
            "nric_front" => $frontimg,
            "nric_back" => $backimg,
            "pay_slip" => $slipimg,
            "pay_bil" => $bilimg,
            "bank_statement" => $bankimg,
            "ssm" => $ssmimg,
            "remarks"=> $request->remarks
        ]);

        $cstmr = user_form::where('id', $id)->first();
        $log = new logController();
        $log->title = "Customer Form Updated";
        $log->description = "customer " . $cstmr->fullname . " is updated  By  " . $cstmr->sponser_name . " As a " . $cstmr->sponser_role;
        $log->type = 1;
        $cusid = $log->save();

        notification::create([
            'status' => 1,
            'type' => "customer",
        ]);

        notify::create([
            "message" => "Customer Register NRIC No. is " . $request->ic_number,
            "userid" => $id,
            "link" => "https://ezzyhportal.com/admin/customer",
        ]);


        return redirect()->route('customer.index')
                        ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('customer.index')
                        ->with('success', 'User deleted successfully');
    }

    public function loanStatus(Request $request) {
        if ($request->loan_status == 1) {
            // return response()->json("approve_id".$request->id);
            user_form::where("id", $request->id)->update([
                "loan_status" => 1,
                "loanstatustype" => "approved",
                "follow_up" => ""
            ]);
        } elseif ($request->loan_status == 0) {
            user_form::where("id", $request->id)->update([
                "loan_status" => 0,
                "loanstatustype" => "processing",
                "follow_up" => ""
            ]);
        } elseif ($request->loan_status == 3) {
            user_form::where("id", $request->id)->update([
                "loan_status" => 3,
                "loanstatustype" => "follow up",
                "follow_up" => $request->follow_up
            ]);
        } elseif ($request->loan_status == 2) {
            // return response()->json("reject_id".$request->id);
            user_form::where("id", $request->id)->update([
                "loan_status" => 2,
                "loanstatustype" => "rejected",
                "follow_up" => ""
            ]);
        }

        return redirect()->back();
    }

    public function deleteCustomer($id) {
        user_form::where('id', $id)->delete();
        return redirect()->back()->with('success', "Deleted!");
    }

    public function export(Request $request) {
        $search = $request->search1;
        $loan_status = $request->loan_status1;
        $from_date = $request->date1;
        $to_date = $request->date2;
        $role = $request->role1;
        $sortDate = $request->sdate;
        $uid = $request->id;
        return Excel::download(new UsersExport($search, $loan_status, $from_date, $to_date, $role, $sortDate, $uid), 'customers.xlsx');
    }

    public function singleExport(Request $request) {
        $search = $request->search1;
        $loan_status = $request->loan_status1;
        $from_date = $request->date1;
        $to_date = $request->date2;
        $role = $request->role1;
        $sortDate = $request->sdate;
        $lid = $request->lid;
        return Excel::download(new singleUserExport($search, $loan_status, $from_date, $to_date, $role, $sortDate, $lid), 'customers.xlsx');
    }

    public function importExportView() {
        
    }

    public function import() {
        
    }

    public function approvedCus(Request $request) {
        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 1)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('loan_status', 1)->orderBy('id', 'desc')->paginate(5);
            }
        } else {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 1)->where("sid", Auth::user()->id)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('sid', Auth::user()->id)->where('loan_status', 1)->orderBy('id', 'desc')->paginate(5);
            }
        }
        $data->map(function($a){
            $a->dealer = User::where('id',$a->pid)->first();
            return $a;
        });
        // $customers = user_form::where('loan_status',1)->paginate(5);
        return view('admin.customer.approved', compact('data'));
    }

    // Rejected customer
    public function rejectedCus(Request $request) {

        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 2)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('loan_status', 2)->orderBy('id', 'desc')->paginate(5);
            }
        } else {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 2)->where('sid', Auth::user()->id)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('sid', Auth::user()->id)->where('loan_status', 2)->orderBy('id', 'desc')->paginate(5);
            }
            $data->map(function($a){
                $a->dealer = User::where('id',$a->pid)->first();
                return $a;
            });
        }

        // $customers = user_form::where('loan_status',2)->paginate(5);
        return view('admin.customer.rejected', compact('data'));
    }

    // follow up customer
    public function followUpCus(Request $request) {
        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 3)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('loan_status', 3)->orderBy('id', 'desc')->paginate(20);
            }
        } else {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 3)->where('sid', Auth::user()->id)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('sid', Auth::user()->id)->where('loan_status', 3)->orderBy('id', 'desc')->paginate(5);
            }
        }
        $data->map(function($a){
            $a->dealer = User::where('id',$a->pid)->first();
            return $a;
        });

        // $customers = user_form::where('loan_status',3)->paginate(5);
        return view('admin.customer.followup', compact('data'));
    }

    // New customer
    public function newCus(Request $request) {

        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {

            if ($request->search != "") {

                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', -1)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('loan_status', -1)->orderBy('id', 'desc')->paginate(20);
            }
        } else {
            if ($request->search != "") {
                $data = user_form::where('loan_status', -1)->where('sid', Auth::user()->id)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('sid', Auth::user()->id)->where('loan_status', -1)->orderBy('id', 'desc')->paginate(20);
            }
        }
            $data->map(function($a){
                $a->dealer = User::where('id',$a->pid)->first();
                return $a;
            });
        // $data = user_form::where('loan_status',0)->orderBy('id', 'desc')->paginate(5);
        return view('admin.customer.new', compact('data'));
    }

    // New customer
    public function processCus(Request $request) {

        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin") {
            if ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 0)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('loan_status', 0)->orderBy('id', 'desc')->paginate(20);
            }
        } else {
            if ($request->search != "") {
                $data = user_form::where('loan_status', 0)->where('sid', Auth::user()->id)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                $data = user_form::where('sid', Auth::user()->id)->where('loan_status', 0)->orderBy('id', 'desc')->paginate(20);
            }
        }
        $data->map(function($a){
            $a->dealer = User::where('id',$a->pid)->first();
            return $a;
        });

        // $data = user_form::where('loan_status',0)->orderBy('id', 'desc')->paginate(5);
        return view('admin.customer.processing', compact('data'));
    }

    public function docs(Request $request, $id) {
        $data = user_form::where('id', $id)->get();
        return view('admin.customer.document', compact('data'));
    }
    public function singleApp(Request $request ,$id){
        if ($request->from_date != "" && $request->to_date != "") {
            // $data = user_form::where('pid',$id)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("id", "desc")->paginate(5);
            $data = user_form::where('pid',$id)->orWhere("spid",$id)->orWhere("sid",$id)->whereBetween('updated_at', [$request->from_date, $request->to_date])->orderBy("id", "desc")->paginate(5);
            $data->appends(["from_date", $request->from_date, "to_date" => $request->to_date]);
        }
        elseif ($request->search != "") {
                //            $data = user_form::where('ic_number','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
                $data = user_form::where('loan_status', 1)->where(function($q) use($request) {
                            $q->where('ic_number', 'like', '%' . $request->search . '%')->orWhere('loanstatustype', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('sponser_name', 'like', '%' . $request->search . '%')->orWhere('sponser_role', 'like', '%' . $request->search . '%')->orWhere('company_name', 'like', '%' . $request->search . '%');
                        })->paginate(20);
                $data->appends(["search", $data]);
            } else {
                // $data = user_form::where('loan_status', 1)->where('pid', $id)->orderBy('id', 'desc')->paginate(5);
                $data = user_form::where('loan_status', 1)->where(function($q) use($id) {
                    $q->where('pid',$id)->orWhere("spid",$id)->orWhere("sid",$id); })
                    ->orderBy('id', 'desc')->paginate(5);

            }
            $data->map(function($a){
                $a->dealer = User::where('id',$a->pid)->first();
                return $a;
            });
        return view('admin.customer.singleApp', compact('data'));
    }

}
