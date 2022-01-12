<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
    
class StaffController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->where('is_staff',1)->paginate(5);
        return view("admin.staff.index",compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
        
    }

    public function create()
    {
        $roles = Role::where('is_staff',1)->pluck('name','name')->all();
        return view("admin.staff.create",compact('roles'));

    }
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'roles' => 'required'
        ]);
    
        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        // $input['is_staff'] = 1;
       
        $user = User::create([
            'name'=> $request->name,
            "email"=> $request->email,
            "password"=>$request->password,
            "is_staff"=>1
        ]);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('admin.staffs')->with('success','Staff created successfully');
    }
 
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('is_staff',1)->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view("admin.staff.edit",compact('user','roles','userRole'));

    }
 
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
        return redirect()->route('admin.staffs')
                        ->with('success','Staff updated successfully');
    }
   
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.staffs')
                        ->with('success','Staff deleted successfully');
    }


    public function roleIndex(Request $request){
        $roles = Role::where("is_staff",1)->orderBy('id','DESC')->paginate(5);
        return view('admin.staff.roles',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function roleCreate(){
        $permission = Permission::get();
        return view('admin.staff.createRole',compact('permission'));
    }
    public function roleEdit($id){
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('admin.staff.editRole',compact('role','permission','rolePermissions'));
    }
    public function storeRole(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name'),'is_staff'=>1]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('staffs.roles')
                        ->with('success','Role created successfully');
    }
    public function roleUpdate(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('staff.roles')
                        ->with('success','Role updated successfully');
    }
    public function roleDelete(){
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('staff.roles')
                        ->with('success','Role deleted successfully');
    }
    
    public function staffregist_page(Request $request, $id)
    {
        return view('staffRegister', compact('id'));
    }
    public function register_staff(Request $request, $id)
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

}