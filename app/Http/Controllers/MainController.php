<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Contact;
use Illuminate\Support\Facades\Mail;

use Redirect, Response;

class MainController extends Controller
{
    function form()
    {
        return view('form');
    }
    function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|regex:/^[ぁ-んァ-ン]+$/',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'message' => 'required|string|max:300'
        ]);
        $data['address'] = (isset($_POST['address'])) ? $_POST['address'] : NULL;
        $data['type'] = (isset($_POST['type'])) ? implode(',', $_POST['type']) : NULL;

        Contact::create($data);
        $this->send($request);

        return Redirect::to("form")->withSuccess('ありがとうございます。お問い合わせを送信しました！');
    }

    function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/manage');
        }
        else
        {
            return back()->with('error', 'ログイン情報が正しくありません。');
        }

    }

    function manage()
    {
        if (!isset(Auth::user()->email)) {
            return redirect('login');
        }
        $contacts = Contact::all();
        foreach ($contacts as $contact) {
            if ($contact['type'] == '1') {
                $contact['type'] = '電話番号';
            } elseif ($contact['type'] == '0') {
                $contact['type'] = 'メールアドレス';
            } elseif ($contact['type'] == '1,0') {
                $contact['type'] = '電話番号、メールアドレス';
            } else $contact['type'] = NULL;
        }
        return view('manage',compact('contacts'));
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    function send(Request $req) {
        $req->validate([
            'email'  =>  'required|email',
            'message' =>  'required',

        ]);

        $data = [
            'email'       => $req->email,
            'subject'     => $req->subject,
            'name'        => $req->name,
            'bodyMessage' => $req->message,
            'phone'       => $req->phone,
            'address'     => $req->address,
            'type'        => ($req->type == NULL) ? NULL : implode(',', $req->type),
            'gender'      => $req->gender
        ];

        if ($data['type'] == '1') {
            $data['type'] = '電話番号';
        } elseif ($data['type'] == '0') {
            $data['type'] = 'メールアドレス';
        } elseif ($data['type'] == '1,0') {
            $data['type'] = '電話番号、メールアドレス';
        } else $data['type'] = NULL;

        Mail::send('mail.mail',$data,function($message) use ($data){
            $message->from('otoiawase.test2010@gmail.com','〇〇株式会社');
            $message->to($data['email']);
            $message->subject('〇〇株式会社　お問い合わせを送信完了の連絡');

        });
        Mail::send('mail.mailadmin',$data,function($message) use ($data){
            $message->from('otoiawase.test2010@gmail.com','〇〇株式会社');
            $message->to('otoiawase.test2010@gmail.com');
            $message->subject('お問い合わせを受信完了の連絡');
        });
    }
}

?>
