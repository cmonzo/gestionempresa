<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Service;

use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $sales = Sale::orderBy('type', 'ASC')->get();
            return view('sales.index', compact('sales'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $services= Service::orderBy('type', 'ASC')->get();
            $customers = Customer::orderBy('surname', 'ASC')->get();
            return view('sales.create', compact('customers','services'));
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
            $sale = new sale();
            $sale->locator = time() . '_' . $request->type . $request->customer;
            $sale->type = $request->type;
            $sale->net = $request->net;
            $sale->commission = $request->commission;
            $sale->comment = $request->comment;
            $sale->user_id = Auth::user()->id;
            $sale->customer_id = $request->customer;
            $sale->save();
            $sale->services()->attach($request->service_id);
            return redirect()->route('sales.index');
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
    public function show(Sale $sale)
    {
        if (Auth::check()) {
            return view('sales.show', compact('sale'));
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
        //aqui en la vista de edit, hare que el update ademas tenga el campo para añadir la venta con el servicio y poder hacer el attach
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
