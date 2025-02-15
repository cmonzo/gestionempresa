<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    public function register (RegisterRequest $request){
        //dd('llega');
        $user = new User();
        $user->name =$request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->rol = 'worker';
        $user->save();
        
        return view('index');
        //print_r($request);
        //var_dump($user);

    }

    public function registerForm(){
        return view("auth.register");
    }

    public function loginForm(){
        if(Auth::viaRemember()){
            return redirect()->route('indice');
        } else {
            if (Auth::check()){
                return redirect()->route('indice');
            } else {
                return view('auth.login');
            }
        }
    }

    public function login(Request $request){
        $credenciales = $request->only('name','password');

        if (Auth::guard('web')->attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->route('indice');
        } else {
            $error = 'Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
