<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    //
    public function index(Request $request){
        if (!auth()->check()){
            return view('errors.401');
        }

        return view('proposal.index');
    }
}
