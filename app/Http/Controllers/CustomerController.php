<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar operaciones CRUD de clientes
 * 
 * Maneja la creación, edición, visualización y eliminación de clientes
 * Todas las acciones requieren autenticación
 */
class CustomerController extends Controller
{
    /**
     * Muestra una lista paginada de clientes ordenados por apellido
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $customers = Customer::orderBy('surname', 'ASC')->get();
            return view('customers.index', compact('customers'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Muestra el formulario para crear un nuevo cliente
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function create()
    {
        if (Auth::check()) {
            return view('customers.create');
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Almacena un nuevo cliente en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request  Datos del formulario
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException Si falla la validación
     */

    public function store(Request $request)
    {
        if (Auth::check()) {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->surname = $request->surname;
            $customer->phone = $request->phone;
            $customer->nif = $request->nif;
            $customer->adress = $request->adress;
            $customer->save();
            return redirect()->route('customers.index');

        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Muestra los detalles de un cliente específico
     *
     * @param  \App\Models\Customer  $customer  Modelo de cliente inyectado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function show(Customer $customer)
    {
        if (Auth::check()) {
            return view('customers.show', compact('customer'));
        } else {
            return redirect()->route('indice');
        }
    }

    

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
