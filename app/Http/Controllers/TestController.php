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
            throw new \Exception("Пользователь не авторизован", 401);
        }

        return view('proposal.index');
    }
}
