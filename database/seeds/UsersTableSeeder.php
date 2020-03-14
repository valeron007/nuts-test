<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $manager = new User();
        $manager->name = 'manager';
        $manager->email = 'manager@gmail.com';
        $manager->password = Hash::make('rfk,fcf0702');
        $manager->save();
        $manager->assignRole('manager');
    }

}
