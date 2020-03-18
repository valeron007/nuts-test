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
        if (auth()->user()->hasRole('employee')){
            return redirect()->route('proposal');
        }else if(auth()->user()->hasRole('manager')){
            return redirect()->route('list-proposal');
        }

        return view('home');
    }

    public function show(){
        return view('proposal.list');
    }

}
