<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'seller-delete',
           'seller-edit',
           'seller-list',
           'seller-create',
           'subseller-delete',
           'subseller-edit',
           'subseller-list',
           'subseller-create',
           'dealer-delete',
           'dealer-edit',
           'dealer-list',
           'dealer-create',
           'subdealer-delete',
           'subdealer-edit',
           'subdealer-list',
           'subdealer-create',
           'customer-delete',
           'customer-edit',
           'customer-list',
           'customer-create',

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}