<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SendMailController extends Controller
{
    //
    public function index(){
        Mail::send('emails.proposal', ['name','web'], function ($messsage){
            $messsage->to('valeronchik0702@gmail.com', 'to web')->subject('Proposal create');
            $messsage->from('valeronchik0702@gmail.com');
        });
    }

}
