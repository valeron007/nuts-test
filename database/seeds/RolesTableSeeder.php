<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['name' => 'manager', 'guard_name' => 'web'],
            ['name' => 'employee', 'guard_name' => 'web'],
        ]);

        $role = Role::findByName('manager');
        $role->givePermissionTo(['view proposal', 'edit proposal', 'delete proposal']);
        $employeeRole = Role::findByName('employee');
        $employeeRole->givePermissionTo(['create proposal']);

    }
}
