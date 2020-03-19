<?php

namespace App\Http\Controllers;


use App\Jobs\MailPodcast;
use Illuminate\Http\Request;
use App\Proposal;
use Illuminate\Support\Facades\Storage;


class ProposalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request){
        if (!auth()->check()){
            throw new \Exception("Пользователь не авторизован", 401);
        }

        return view('proposal.index');
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function show(Request $request){
        $proposals = Proposal::all()->toArray();

        return json_encode($proposals);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
                $path = $request->file('file')->store('public');
                $url = asset('storage/'.basename($path));

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request){
        try{
            $proposal = Proposal::where('id', '=', $request->id)->first();
            $proposal->mark = !$request->mark;
            $proposal->save();

        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        return response()->json(['success' => 'Успешно']);
    }

}
