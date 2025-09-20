<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [
                'group_name' => 'landlord.dashboard',
                'permissions' => [
                    'dashboard.income-graph',
                    'dashboard.total-pay-bill',
                    'dashboard.total-due-bill',
                ]
            ],
            [
                'group_name' => 'landlord.flat',
                'permissions' => [
                    // admin.education_system
                    'flat.list',
                    'flat.create',
                    'flat.update',
                    'flat.delete',
                ]
            ],
            [
                'group_name' => 'landlord.pay-bill',
                'permissions' => [
                    // Blog Permissions
                    'pay-bill.list',
                    'pay-bill.create',
                    'pay-bill.update',
                    'pay-bill.due-bill-show',
                    'pay-bill.dashboard',
                    'pay-bill.receipt',
                ]
            ],
           
          
          
            [
                'group_name' => 'landlord.role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'landlord.profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
            
         
        ];


        // Create and Assign Permissions
        // for ($i = 0; $i < count($permissions); $i++) {
        //     $permissionGroup = $permissions[$i]['group_name'];
        //     for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
        //         // Create Permission
        //         $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
        //         $roleSuperAdmin->givePermissionTo($permission);
        //         $permission->assignRole($roleSuperAdmin);
        //     }
        // }

        // Do same for the admin guard for tutorial purposes
        $roleSuperAdmin = Role::create(['name' => 'Superadmin', 'guard_name' => 'web']);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
                for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                    // Create Permission
                    $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup, 'guard_name' => 'web']);

                    if(strpos($permissionGroup,'admin')!== false){
                        $roleSuperAdmin->givePermissionTo($permission);
                        $permission->assignRole($roleSuperAdmin);
                     }
            }
        }

        // Assign super admin role permission to superadmin user
        $admin = User::where('usertype', 'Admin')->first();
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }
}
