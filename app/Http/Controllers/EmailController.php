<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function index(){
        $data=['name'=>'Shezan', 'data'=>'hello shezan'];
        $user['to'] = 'farowaprema93@gmail.com';
        Mail::send('mail', $data, function ($message) use ($user){
            //$message->from('john@johndoe.com', 'John Doe');
            //$message->sender('john@johndoe.com', 'John Doe');
            $message->to($user['to']);
            //$message->cc('john@johndoe.com', 'John Doe');
            //$message->bcc('john@johndoe.com', 'John Doe');
            //$message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('hello dev');
            //$message->priority(3);
            //$message->attach('pathToFile');
        });
    }
}
