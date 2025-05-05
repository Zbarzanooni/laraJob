<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator']) ;

        $role = Role::create(['name' => 'super-admin']);
    }
}
