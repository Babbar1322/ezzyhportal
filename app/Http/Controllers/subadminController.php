<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class subadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:seller-list|seller-create|seller-edit|seller-delete', ['only' => ['index','store']]);
         $this->middleware('permission:seller-create', ['only' => ['create','store']]);
         $this->middleware('permission:seller-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:seller-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        
        if($request->search !="" ){
            $data = DB::select("SELECT u.id as id , u.login_code as login_code , u.name as name ,  u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='subadmin' and (u.name Like '%".$request->search."%' or u.email Like '%".$request->search."%' ) order by id desc");
        }
        else{
            // $data = User::role('subadmin')->paginate(5); 
            $data = DB::select("SELECT u.id as id , u.login_code as login_code , u.name as name ,  u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='subadmin' order by id desc");
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
        return view('admin.subadmin.index',compact('data'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','subadmin')->pluck('name','name')->all();
        return view('admin.subadmin.create',compact('roles'));
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
        $input['showPass'] = $input['password'];
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('subadmin.index')
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
        return view('admin.subadmin.show',compact('user'));
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
        $roles = Role::where('name','subadmin')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.subadmin.edit',compact('user','roles','userRole'));
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
            $input['showPass'] = $input['password'];
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'),array('showPass'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('subadmin.index')
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
        return redirect()->route('subadmin.index')
                        ->with('success','User deleted successfully');
    }
}
