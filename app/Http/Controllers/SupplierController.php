<?php

namespace App\Http\Controllers;

use App\Models\Supplier;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $suppliers = Supplier::orderBy('name','ASC')->get();
            return view ('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
        return view ('suppliers.create');
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        if (Auth::check()) {
        return view ('suppliers.show', compact('supplier'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        if (Auth::check()) {
        return view ('suppliers.edit', compact('supplier'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        if (Auth::user()->rol == 'admin') {
            $supplier->delete();
            return redirect()->route('supplier.index', ['elim' => 1]);
        } else {
            return redirect()->route('indice');
        }
    }
}
