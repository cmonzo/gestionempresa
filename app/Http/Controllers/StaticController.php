<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iluminate\Support\Facades\Mail;
use App\Mail\ContactMail;

/**
 * Controlador para manejar páginas estáticas del sitio
 * 
 * Gestiona las vistas principales que no requieren lógica compleja
 */
class StaticController extends Controller
{
    /**
     * Muestra la página principal del sitio
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
    /**
     * Muestra la página de contacto
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
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

    /**
     * Muestra la página "Quiénes somos"
     *
     * @return \Illuminate\View\View
     */
    public function who()
    {
        return view('who');
    }


}
