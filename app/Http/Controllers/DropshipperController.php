<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\banner;
use Spatie\Permission\Models\Role;
use App\Models\logController;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


use Illuminate\Support\Facades\Auth;

class DropshipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        if($request->search !="" ){ 
                if($request->id != ""){
                    $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' and u.name Like '%".$request->search."%' and u.spid =".$request->id." order by id desc");  
                }
                else{
                    $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' and u.name Like '%".$request->search."%' order by id desc");  
                }
                
            }
      
            if(Auth::user()->roles[0]->name == 'Admin' ||Auth::user()->roles[0]->name == 'subadmin'){
                 if(isset($request->id)){
                    
                    // $data = User::role('dropshipper')->where('spid',$request->id)->paginate(5);
                         $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' and u.spid =".$request->id." order by id desc");
                    }
                    else{
                // $data = User::role('dropshipper')->paginate(5);
                        $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' order by id desc");
                    }

                }
            else{
                if(isset($request->id)){
                    
                    // $data = User::role('dropshipper')->where('spid',$request->id)->paginate(5);
                         $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' and u.spid =".$request->id." order by id desc");
                }
                else{
                    // $data = User::role('dropshipper')->where('spid',Auth::user()->id)->paginate(5);
                    $data = DB::select("SELECT u.spid as spid , u.id as id ,u.login_code as login_code,u.name as name , u.email as email , u.showPass as showPass , u.created_at as created_at ,rl.name as rlname FROM ((users as u INNER JOIN model_has_roles as m ON u.id = m.model_id) INNER JOIN roles as rl ON m.role_id = rl.id) where rl.name='dropshipper' and u.spid =".Auth::user()->id." order by id desc");
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
        return view('admin.dropshippers.index', compact('data'))
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
        return view('admin.dropshippers.create', compact('roles'));
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



        
        $role = Auth::user()->roles[0]->name;
        // dd($role);
        if($role != "subseller"){
            return redirect()->back()->with("error","Invalid subseller id");
            exit;
        }

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            return redirect()->route('dropshippers.index')
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
        return view('admin.dropshippers.show', compact('user'));
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
        $roles = Role::where('name','dropshipper')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.dropshippers.edit', compact('user', 'roles', 'userRole'));
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

        return redirect()->route('dropshippers.index')
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

        return redirect()->route('dropshippers.index')
            ->with('success', 'User deleted successfully');
    }

    // seller register

    public function dropregist_page(Request $request, $id)
    {
        return view('dropshipperRegister', compact('id'));
    }
    public function register_dropShipper(Request $request, $id)
    {

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

        return redirect()->back()->with('success','Your Request Successfully Submitted');
        // Auth::login($user);

        // return redirect('admin/dashboard');
    }

    public function dropshipperAdd(){
        return view('admin.dropshippers.addNew');
    }

    public function dropshipperStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
        
        $role = Auth::user()->roles[0]->name;
        if($role != "subseller"){
            return redirect()->back()->with("error","Invalid Subseller");
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['spid'] = Auth::user()->id;
       
        $user = User::create($input);
        $user->assignRole('dropshipper');
    
        return redirect()->route('dropshippers.index')
                        ->with('success','Dropshipper created successfully');
    }
    
     
}
