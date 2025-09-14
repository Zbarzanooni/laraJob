<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles
        $roles  = ['admin','employer','user'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        //permission
        $permissions = ['create job', 'edit job', 'delete job', 'apply job'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // اختصاص دسترسی‌ها به نقش‌ها
        $admin = Role::where('name', 'admin')->first();
        $admin->Permissions()->attach(Permission::all());

        $employer = Role::where('name', 'employer')->first();
        $employer->Permissions()->attach([1,2,3]);

        $user = Role::where('name', 'user')->first();
        $user->Permissions()->attach([4]);
    }
}
