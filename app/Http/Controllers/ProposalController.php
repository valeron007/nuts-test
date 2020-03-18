<?php

namespace App\Http\Controllers;


use App\Jobs\MailPodcast;
use Illuminate\Http\Request;
use App\Proposal;
use Illuminate\Support\Facades\Storage;
use App\Mail\ProposalMail;
use Illuminate\Support\Facades\Mail;


class ProposalController extends Controller
{
    //
    public function index(Request $request){

    }

    public function create(Request $request){
        try {
            if (auth()->check() && auth()->user()->hasRole('employee')) {
                $user = auth()->user();
                $check_proposal = Proposal::where('date_create_proposal', '=',date("Y-m-d"))
                                ->where('client_id', '=', $user->id)
                                ->get()->toArray();


                if (!empty($check_proposal)){
                    return response()->json(['error' => 'Заявка оставляется раз в сутки']);
                }
                $data = json_decode($request->request->get('data'), true);
                $path = $request->file('file')->store('proposal');
                $url = Storage::url($path);
                $data['date_create_proposal'] = date("Y-m-d");
                $data['client_id'] = $user->id;
                $data['url_file'] = $url;
                $data['file'] = $path;
                $proposal = new Proposal();
                $proposal->fill($data);
                $proposal->save();
                MailPodcast::dispatch($data)->delay(now()->addMinutes(1));
            } else {
                return response()->json(['error' => 'Пользователь не авторизован'], 401);
            }
        }catch(\Exception $error){
            return response()->json([
                'Error' => $error->getMessage(),
                $error->getCode(),
                ]);
        }

        return response()->json(['Complete' => "Заявка успешно добавлена"]);
    }

    public function delete(Request $request){

    }

    public function update(Request $request){

    }

}
