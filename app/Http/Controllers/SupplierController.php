<?php

namespace App\Http\Controllers;

use App\Models\Supplier;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para gestionar proveedores
 * 
 * Maneja las operaciones CRUD para la gestión de proveedores en el sistema
 */
class SupplierController extends Controller
{
    /**
     * Muestra un listado de todos los proveedores ordenados por nombre
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $suppliers = Supplier::orderBy('name', 'ASC')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Muestra el formulario para crear un nuevo proveedor
     * 
     * Requiere autenticación
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            return view('suppliers.create');
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Almacena un nuevo proveedor en la base de datos
     * 
     * Requiere autenticación
     *
     * @param  \Illuminate\Http\Request  $request  Datos del formulario
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException Si falla la validación
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->cif = $request->cif;
            $supplier->adress = $request->adress;
            $supplier->save();
            return redirect()->route('suppliers.index');

        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Muestra los detalles de un proveedor específico
     * 
     * Requiere autenticación
     *
     * @param  \App\Models\Supplier  $supplier  Modelo de proveedor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Supplier $supplier)
    {
        if (Auth::check()) {
            return view('suppliers.show', compact('supplier'));
        } else {
            return redirect()->route('indice');
        }
    }

   /**
     * Muestra el formulario para editar un proveedor existente
     * 
     * Requiere autenticación
     *
     * @param  \App\Models\Supplier  $supplier  Modelo de proveedor a editar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Supplier $supplier)
    {
        if (Auth::check()) {
            return view('suppliers.edit', compact('supplier'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Actualiza un proveedor existente en la base de datos
     * 
     * Requiere autenticación
     *
     * @param  \Illuminate\Http\Request  $request  Datos actualizados
     * @param  \App\Models\Supplier  $supplier  Modelo de proveedor a actualizar
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException Si falla la validación
     */
    public function update(Request $request, Supplier $supplier)
    {
        if (Auth::check()) {
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->cif = $request->cif;
            $supplier->adress = $request->adress;
            $supplier->save();
            return redirect()->route('suppliers.index');

        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Elimina un proveedor de la base de datos
     * 
     * Requiere rol de administrador
     *
     * @param  \App\Models\Supplier  $supplier  Modelo de proveedor a eliminar
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Exception Si falla la eliminación
     */
    public function destroy(Supplier $supplier)
    {
        if (Auth::user()->rol == 'admin') {
            $supplier->delete();
            return redirect()->route('suppliers.index', ['elim' => 1]);
        } else {
            return redirect()->route('indice');
        }
    }
}
