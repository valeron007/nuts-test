<?php

namespace App\Http\Controllers;

use App\Exceptions\RoleException;
use DateTime;
use Illuminate\Http\Request;
use App\Proposal;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    //
    public function index(Request $request){

    }

    public function create(Request $request){
        try {
            if (auth()->check() && auth()->user()->hasRole('employee')) {
                dd($request);
                $user = auth()->user();
                $data = json_decode($request->request->get('data'), true);
                $dateTime = new DateTime();
                $data['date_create_proposal'] = $dateTime->format('Y-m-d H:i:s');
                $data['client_id'] = $user->id;
                $proposal = new Proposal();
                $proposal->fill($data);
                $proposal->save();
            } else {
                return response()->json(['error' => 'Пользователь не авторизован']);
            }
        }catch(\Exception $error){
            return response()->json([
                'Error' => $error->getMessage(),
                'Code'  => $error->getCode(),
                ]);
        }

        return response()->json(['Complete' => "Заявка успешно добавлена"]);
    }

    public function delete(Request $request){

    }

    public function update(Request $request){

    }

}
