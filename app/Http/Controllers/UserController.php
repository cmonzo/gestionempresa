<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::check() && Auth::user()->rol == 'admin') {
            return view('users.edit', compact('user'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::check()) {
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->nif = $request->nif;
            $user->born = $request->born;
            $user->alias = $request->alias;
            $user->department = $request->department;
            $user->hiring = $request->hiring;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->get('password'));
            
            if (Auth::user()->rol == 'admin') {
                $user->rol = $request->rol;
                $user->status = $request->status;
                $user->position = $request->position;
            }
            $user->save();
        }
        return redirect()->route('indice');

    }
    public function updateWorker(Request $request, User $user)
    {
        if (Auth::check()) {
            if (Auth::user()->rol == 'admin') {
                $user->rol = $request->rol;
                $user->status = $request->status;
                $user->position = $request->position;
            }
            $user->save();
        }
        return redirect()->route('indice');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->rol == 'admin') {
            $user->delete();
            return redirect()->route('users.index', ['elim' => 1]);
        } else {
            return redirect()->route('indice');
        }
        //para eliminar, puedo crear una vista en la que te lleve a otra pagina donde diga si(se elimina) y no, vuelve a la pagina anterior
    }
}
