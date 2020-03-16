<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;


class TestController extends Controller
{
    //
    public function index(Request $request){
        if (!auth()->check()){
            return "Пользователь не авторизован";
        }

        return view('proposal.index');
    }
}
