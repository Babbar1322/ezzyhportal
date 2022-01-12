<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\banner;
use Spatie\Permission\Models\Role;
use App\Models\logController;
use App\Models\notification;
use App\Models\notify;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


use Illuminate\Support\Facades\Auth;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
//        $this->middleware('permission:seller-list|seller-create|seller-edit|seller-delete', ['only' => ['index','store']]);
        $this->middleware('permission:seller-list', ['only' => ['index','store']]);
         $this->middleware('permission:seller-create', ['only' => ['create','store']]);
         $this->middleware('permission:seller-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:seller-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
     
        if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin'){
            if($request->search){
                // $data = User::role('seller')->where('login_code','like',"%".$request->search."%")->orderBy("id","desc")->get();
                $data = DB::select("SELECT u.id as id ,u.login_code as login_code , u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='seller'  and u.name Like '%".$request->search."%' order by id desc");
            }
            else{
                // $data = User::role('seller')->orderBy("id","desc")->get();
                $data = DB::select("SELECT u.id as id ,u.login_code as login_code , u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='seller'  order by id desc");
            }
        }
        else{
            if($request->search){
               
                $data = DB::select("SELECT u.id as id ,u.login_code as login_code , u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='seller' and u.spid=" .Auth::user()->id. " and u.name Like '%".$request->search."%' order by id desc");

            }
            else{
                // $data = User::role('seller')->where('spid',Auth::user()->id)->orderBy("id","desc")->get();
                $data = DB::select("SELECT u.id as id ,u.login_code as login_code , u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='seller' and u.spid = ".Auth::user()->id." order by id desc");

            }

        }
        $total=count($data);
        $per_page = 20;
        $current_page = $request->input("page") ?? 1;
        $starting_point = ($current_page * $per_page) - $per_page;
        $data = array_slice($data, $starting_point, $per_page, true);
        $data = new Paginator($data, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        // $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.seller.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.seller.create', compact('roles'));
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
      
        return redirect()->route('seller.index')
            ->with('success', 'User created successfully');
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
        return view('admin.seller.show', compact('user'));
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
//        $roles = Role::pluck('name', 'name')->all();
            $roles = Role::where('name','seller')->pluck('name','name')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.seller.edit', compact('user', 'roles', 'userRole'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        $log = new logController();
        $log->title = "Edit Seller ";
        $log->description = "Seller #" .$id. " detail edit by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();

        return redirect()->route('seller.index')
            ->with('success', 'User updated successfully');
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

        $log = new logController();
        $log->title = "Delete Seller ";
        $log->description = "Seller #" .$id. " Deleted by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();

        return redirect()->route('seller.index')
            ->with('success', 'User deleted successfully');
    }

    // seller register

    public function sregist_page(Request $request, $id)
    {
        return view('sellerRegister', compact('id'));
    }
    public function register_seller(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        $input['spid'] = $id;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        // notification::create([
        //     'status'=>1
        // ]);
        
         notify::create([
            "message" => "Hi admin, New Seller Register as ".$request->name,
            "userid" => $id,
            "link" => "https://ezzyhportal.com/admin/seller",
        ]);
         
        $usr = User::where('id',$id)->first();
        $log = new logController();
        $log->title = "Seller Registerted";
        $log->description = "Seller " .$user->name. " is registered using refer By ".$usr->name ." As a " .$usr->roles[0]->name;
        $log->type = 1;
        $log->save();
        return redirect()->route("thankU");
//        return redirect()->back()->with('success','Your Request Successfully Submitted');
        // Auth::login($user);

        // return redirect('admin/dashboard');
    }

    public function Banner(){
        $bans = banner::where('user_id',Auth::user()->id)->get();
        return view('admin.seller.banners',compact('bans'));
    }
    public function storeBanner(Request $request){
        $banner = banner::where('user_id',Auth::user()->id)->count();
        if($request->hasFile('banner')){
            $file = $request->banner;
            $filename = $file->getClientOriginalName();
            $file->move(public_path("/uploads/banners/"),$filename);
        if($banner == 0){
                banner::create([
                    'user_id'=>Auth::user()->id,
                    'banner'=>$filename
                ]);
            }
            else{
                banner::where('user_id',Auth::user()->id)->update([
                    'banner'=>$filename
                ]);
            }
        }
        return redirect()->back();
    }
}
