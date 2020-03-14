<?php

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
        //
        Permission::create([
            'name' => 'view proposal'
        ]);
        Permission::create([
            'name' => 'create proposal'
        ]);
        Permission::create([
            'name' => 'edit proposal'
        ]);

        Permission::create([
            'name' => 'delete proposal'
        ]);


    }
}
