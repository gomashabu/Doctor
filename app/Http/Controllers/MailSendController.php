<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{
    public function send(Request $request)
    {
        $input = $request->input();
        $name = $input['name'];
        $youremail = $input['email'];
        $email ='ruiiiii1112@gmail.com';
        
        Mail::send('emails.test',
        [
            'name'=>$name,
            'email' =>$youremail,
        ],
        function($message) use ($email){
            $message->to($email)
                    ->subject('新規ユーザー');
        }
        );
        
        return redirect('/');
    }
}
