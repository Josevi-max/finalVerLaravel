<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleA =  Role::create(['name' => 'Admin']);
        $roleB = Role::create(['name' => 'Student']);

        Permission::create(["name"=>"dashboard.admin"])->assignRole($roleA);
        Permission::create(["name"=>"buy.create"])->assignRole($roleB);
        Permission::create(["name"=>"buy.store"])->assignRole($roleB);
    }
}
