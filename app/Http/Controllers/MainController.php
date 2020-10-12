<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Contact;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

use Redirect, Response;

class MainController extends Controller
{
    function index1()
    {
        return view('welcome');
    }
    function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|regex:/^[ぁ-んァ-ン]+$/',
            'email' => 'required|email',
            'phone' => 'required|numeric',
//            'type' => 'null',
            'gender' => 'required',
            'message' => 'required'
        ]);

        Contact::create($data);

        return Redirect::to("welcome")->withSuccess('Great! Form successfully submit with validation.');
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
            return redirect('login/successlogin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
        $contacts = Contact::all();
        return view('successlogin',compact('contacts'));
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("huynm1103@gmail.com")->send(new DemoEmail($objDemo));
    }

//    public function storeContact(Request $request){
//// validation goes here
//        $contact = Contact::create($request->all());
//        return $contact;
//    }
//    public function getAllContacts(){
//        $contacts = Contact::all();
////if you want to get contacts on where condition use below code
////$contacts = Contact::Where('tenant_id', "1")->get();
//        return view('listContact', compact('contacts'));
//    }

}

?>
