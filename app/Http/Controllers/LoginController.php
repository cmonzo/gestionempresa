<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * Controlador para manejar autenticación de usuarios
 * 
 * Gestiona registro, login, logout y vistas relacionadas con la autenticación
 */
class LoginController extends Controller
{
    /**
     * Registra un nuevo usuario con rol 'worker'
     * 
     * @param  \App\Http\Requests\RegisterRequest  $request  Datos validados del formulario
     * @return \Illuminate\View\View
     */
    public function register(RegisterRequest $request)
    {
        // Crea nuevo usuario con los datos del formulario
        $user = new User();
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->phone = $request->get('phone');
        $user->nif = $request->get('nif');
        $user->born = $request->get('born');
        $user->alias = $request->get('alias');
        $user->department = $request->get('department');
        $user->email = $request->get('email');
        $user->hiring = $request->get('hiring');
        $user->status = $request->get('status');
        $user->gender = $request->get('gender');
        $user->position = $request->get('position');
        $user->password = Hash::make($request->get('password'));
        $user->rol = 'worker';
        $user->save();

        return view('index');

    }

    /**
     * Muestra el formulario de registro.
     *
     * @return 
     */

    public function registerForm()
    {
        return view("auth.register");
    }

    /**
     * Muestra el formulario de login o redirige si ya está autenticado
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return redirect()->route('indice');
        } else {
            if (Auth::check()) {
                return redirect()->route('indice');
            } else {
                return view('auth.login');
            }
        }
    }

   /**
     * Procesa el login del usuario
     *
     * @param  \Illuminate\Http\Request  $request  Credenciales de acceso
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function login(Request $request)
    {
        $credenciales = $request->only('name', 'password');

        if (Auth::guard('web')->attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->route('indice');
        } else {
            $error = 'Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    /**
     * Cierra la sesión del usuario y limpia la sesión
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
