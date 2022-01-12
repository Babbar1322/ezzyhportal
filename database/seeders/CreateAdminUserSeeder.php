<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rk', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        // $user = User::create([
        //     'name' => 'MPN GROUP', 
        //     'email' => 'mpngroup@gmail.com',
        //     'password' => bcrypt('MPN@2022!')
        // ]);
        // ]);
        // $user = User::where("id",1)->update([
        //     'name' => 'MPN GROUP', 
        //     'email' => 'mpngroup@gmail.com',
        //     'password' => bcrypt('MPN@2022!')
        // ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}