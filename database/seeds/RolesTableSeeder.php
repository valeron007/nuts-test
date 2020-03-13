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
    }
}
