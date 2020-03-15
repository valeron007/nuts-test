<?php

namespace App\Http\Controllers;

use App\Exceptions\RoleException;
use DateTime;
use Illuminate\Http\Request;
use App\Proposal;


class ProposalController extends Controller
{
    //
    public function index(Request $request){

    }

    public function create(Request $request){
        if (auth()->check() && auth()->user()->hasRole('employee')){
            $user = auth()->user();
            $data = json_decode($request->request->get('data'), true);
            $dateTime = new DateTime();
            $data['date_create_proposal'] = $dateTime->format('Y-m-d H:i:s');
            $data['client_id'] = $user->id;
            $proposal = new Proposal();
            $proposal->fill($data);
            $proposal->save();
        }else{
            return view('errors.404')->with('Пользователь не авторизован');
        }
    }

    public function delete(Request $request){

    }

    public function update(Request $request){

    }

}
