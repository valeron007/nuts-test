<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        dd(auth()->user());
        $role = Role::findByName('manager');
        $permission = Permission::findByName('view proposal');
        $role->givePermissionTo(['view proposal', 'edit proposal', 'delete proposal']);

//        auth()->user()->givePermissionTo('view proposal');
        auth()->user()->assignRole('manager');
//        dd($permission);
//        dd($role);
        return view('home');
    }
}
