<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class SendEmailController extends Controller
{
    public function index()
    {
        return view('mail');
//        return view('welcome');
    }
    public function post(Request $req)
    {
        $req->validate([
            'email'  =>  'required|email',
//            'subject'     =>  'required',
            'message' =>  'required'
        ]);

        $data = [
            'email'   =>   $req->email,
            'subject'      =>  $req->subject,
            'bodyMessage'   =>   $req->message,
        ];

        Mail::send('mail.mail',$data,function($message) use ($data){
            $message->from('huynm1103@gmail.com','larva');
//            $message->to('email');
//            $message->subject('subject');
            $message->to($data['email']);
            $message->subject('Mail from Absolute');

        });
        Mail::send('mail.mailadmin',$data,function($message) use ($data){
            $message->from('huynm1103@gmail.com','larva');
//            $message->to('email');
//            $message->subject('subject');
            $message->to('huynm1103@gmail.com');
            $message->subject('Mail from Absolute');

        });
        return redirect()->back();
    }
}

?>
