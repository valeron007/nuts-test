<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    //
    public function index(Request $request){
//        $user = User::where('name', '=', 'manager')->first();
//        $user->assignRole('manager');
//        dd($user);

        return view('proposal.index');
    }
}
