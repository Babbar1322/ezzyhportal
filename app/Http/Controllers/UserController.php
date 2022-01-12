<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_form;
use App\Models\notification;
use App\Models\notify;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\logController;
use Illuminate\Support\Facades\Session;

    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:dealer')->except('logout');
         
         
    }
     public function notif(Request $request){
         
        notify::where("userid",$request->id)->where("is_read",0)->update([
            "is_read"=>1
        ]);
        return response()->json(200);
    }
    
    public function index(Request $request)
    {
        if($request->search){
            $cstmrs = user_form::where('ic_number',$request->search)->first();
            return response($cstmrs);
        }
        $data = User::orderBy('id','DESC')->where('is_staff',0)->paginate(5);
        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('is_staff',0)->pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
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
    
        return redirect()->route('users.index')
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
        return view('admin.users.show',compact('user'));
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
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
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete(); 
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function logoutpage()
    {
        Auth::logout();
        return view('user.index');
    }

    public function notification(Request $request){
//        $notif = notification::where('status',0)->update([
//            'status'=> 1
//        ]);
        
        $notif = notify::where("userid",Auth::user()->id)->update([
            'is_read'=> 1
        ]);
        if($request->id){
             logController::where("id",$request->id)->update([
                "is_read" => 1
            ]);
        }
        return response()->json(200);
    }

    public function impersonate($id){
        
        $admin_id = Auth::user()->id;
        die($admin_id);
    
        // Session::put('Admin_id',$admin_id);
        // Auth::logout();
        // Auth::loginUsingId($id);
        $user = User::where('id',$id)->first();
        $users = User::where("id",$id)->get();
        Session::put('users',$users);
   
        if (Auth::guard('dealer')->attempt(array('email' => $user->email, 'password' => $user->showPass))) {
            // return redirect()->route('admin.dashboard');
        }
    }
    public function backToAdmin(){
        Auth::logout();
        $id = Session::get('Admin_id');
        Auth::loginUsingId($id);
        Session::forget('Admin_id');
        return redirect()->route('admin.dashboard');
    }
  
   
}
