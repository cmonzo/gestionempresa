<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iluminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class StaticController extends Controller
{
    public function index(){
        return view('index');
    }

    public function contact(){
        return view('contact');
    }
    
    /*public function send(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('tu_correo@example.com')->send(new ContactMail($details));

        return redirect()->route('contact.form')->with('success', 'Mensaje enviado correctamente');
    }*/

public function who(){
    return view('who');
}

    
}
