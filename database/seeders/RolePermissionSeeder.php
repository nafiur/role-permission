<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Role
        $roleSuperAdmin = Role::create(['name'=>'superadmin']);
        $roleAdmin = Role::create(['name'=>'admin']);
        $roleEditor = Role::create(['name'=>'editor']);
        $roleUser = Role::create(['name'=>'user']);

        // Permission List Array

        $permissions = [
            //Dashboard permission
            'dashboard.view',

            //Dashboard permission
            'profile.view',


            //admin permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
        ];

            


        // Create & Assign Permisision
        for($i=0; $i< count($permissions); $i++) {
            $permission = Permission::create(['name'=> $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
            
    }
}
