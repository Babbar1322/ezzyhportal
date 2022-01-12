<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_form;
use Spatie\Permission\Models\Role;
use App\Models\logController;
use App\Models\notification;
use App\Models\dealerCommission;
use App\Models\notify;
use DB;
use Hash;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;

class dealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:dealer-list|dealer-create|dealer-edit|dealer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:dealer-create', ['only' => ['create','store']]);
         $this->middleware('permission:dealer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:dealer-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin'){
                if($request->search){
                    $data = User::role('dealer')->where('login_code','like',"%".$request->search."%")->orWhere('email',"like","%".$request->search."%")->orWhere("name","like","%".$request->search."%")->orderBy('id', 'desc')->paginate(5);
                }
                else{
                    $data = User::role('dealer')->orderBy('id', 'desc')->paginate(5);
                }
            }
            else{
                if($request->search){
                    $data = User::role('dealer')->where('login_code','like',"%".$request->search."%")->where('spid',Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
                }
                else{
                    $data = User::role('dealer')->where('spid',Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
                }
            } 
        // $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.dealer.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.dealer.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    
        return redirect()->route('dealer.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.dealer.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
//        $roles = Role::pluck('name','name')->all();
        $roles = Role::where('name','dealer')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.dealer.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        $log = new logController();
        $log->title = "Edit Dealer ";
        $log->description = "Dealer #" .$id. " detail edit by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();
    
        return redirect()->route('dealer.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function codesend(Request $request)
    {
        $usr = User::where("login_code",$request->login_code)->first();
        if(!$usr){
            $user = User::findOrFail($request->uid);
            $user->login_code = $request->login_code;
            $user->showPass = $request->password;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success','Code Generated successfully');
        }
        else{
            return redirect()->back()->with("error",'Code Already exists. Please Use Another One.');
        }

    }
    public function destroy($id)
    {
        User::find($id)->delete();

        $log = new logController();
        $log->title = "Delete Dealer ";
        $log->description = "Dealer #" .$id. " Deleted by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();

        return redirect()->route('dealer.index')
                        ->with('success','User deleted successfully');
    }


    // dealer register

    public function dregist_page(Request $request, $id) {
        return view('dealerRegister', compact('id'));
    }

    public function register_dealer(Request $request, $id){
       
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        // 'password' => 'required|same:confirm-password',
        'roles' => 'required'
    ]);
   
    $input = $request->all();
    // $input['password'] = Hash::make($input['password']);
    $input['spid'] = $id;

    $user = User::create($input);
    $user->assignRole($request->input('roles'));
//    notification::create([
//        'status'=>1
//    ]);
    
     notify::create([
            "message" => "Hi admin, New Dealer Register as ".$request->name,
            "userid" => $id,
            "link" => "https://ezzyhportal.com/admin/dealer",
        ]);
     
    $usr = User::where('id',$id)->first();
        $log = new logController();
        $log->title = "Dealer Registerted";
        $log->description = "Dealer " .$user->name. " is registered using refer By ".$usr->name ." As a " .$usr->roles[0]->name;
        $log->type = 1;
        $log->save();

        return redirect()->route("thankU");
//    return redirect()->back()->with('success','Your Request Successfully Submitted');

    // Auth::login($user);
    // return redirect('admin/dashboard');


    }

    public function commission(){
        $customers = user_form::pluck('sid');
        // $dealers = User::role('dealer')->whereIn("id",$customers)->get();
        $dealers = User::role('dealer')->where('login_code',"!=",null)->get();
        return view('admin.dealer.commission',compact('dealers'));
    }

    public function storeCommission(Request $request){
        $total = $request->commission-($request->bonus + $request->fine);
        $commission = dealerCommission::create([
            'dealer_id'=>$request->dealer_id,
            'commission'=>$request->commission,
            'bonus'=>$request->bonus,
            'fine'=>$request->fine,
            'total'=> $total,
            'status'=>1
        ]);
        return redirect('admin/dealerInvoices/'.$commission->id);
        // return redirect()->route('admin.dealerInvoice',["id"=>$commission->id]);
        // return redirect()->route('dealer.slip')->with(['data'=>$commission->dealer_id]);
    }

    public function slip() {
        return view('admin.dealer.commissionslip');
    }
    
}
