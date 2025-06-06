<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Service;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar operaciones relacionadas con ventas
 * 
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    /**
     * Muestra un listado de todas las ventas
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            // Obtener todas las ventas ordenadas por tipo
            $sales = Sale::orderBy('type', 'ASC')->get();
            return view('sales.index', compact('sales'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Busca ventas por nombre de cliente o vendedor
     *
     * @param  \Illuminate\Http\Request  $request  Contiene el parámetro 'worker' para buscar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showSaleClient(Request $request)
    {
        if (Auth::check()) {
            // Buscar IDs de usuarios cuyo nombre coincida con el criterio
            $userId = User::where('name', 'LIKE', "%{$request->worker}%")
                ->pluck('id');
            // Buscar IDs de clientes cuyo nombre coincida con el criterio
            $customerId = Customer::where('name', 'LIKE', "%{$request->worker}%")
                ->pluck('id');
            // Obtener ventas que coincidan con los IDs encontrados
            $sales = Sale::where(function ($query) use ($userId, $customerId) {
                $query->whereIn('user_id', $userId)
                    ->orWhereIn('customer_id', $customerId);
            })
                ->get();
            return view('sales.index', compact('sales'));
        } else {
            return redirect()->route('indice');
        }
    }

   /**
     * Muestra el formulario para crear una nueva venta
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            // Obtener servicios y clientes ordenados para los selects del formulario
            $services = Service::orderBy('type', 'ASC')->get();
            $customers = Customer::orderBy('surname', 'ASC')->get();
            return view('sales.create', compact('customers', 'services'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Almacena una nueva venta en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request  Datos de la venta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $sale = new sale();
            $sale->locator = time() . '_' . $request->type . $request->customer;// Generar identificador único
            $sale->type = $request->type;
            $sale->net = $request->net;
            $sale->commission = $request->commission;
            $sale->comment = $request->comment;
            $sale->user_id = Auth::user()->id;// Asignar vendedor autenticado
            $sale->customer_id = $request->customer;
            $sale->service_id = $request->service_id;
            $sale->save();
            return redirect()->route('sales.index');
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Muestra los detalles de una venta específica
     *
     * @param  \App\Models\Sale  $sale  Modelo de venta inyectado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
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
     * Muestra el formulario para editar una venta existente
     *
     * @param  \App\Models\Sale  $sale  Modelo de venta a editar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Sale $sale)
    {
        if (Auth::check()) {
            $customers = Customer::orderBy('surname', 'ASC')->get();
            $services = Service::orderBy('type', 'ASC')->get();
            return view('sales.edit', compact('sale', 'customers', 'services'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Actualiza una venta existente en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request  Datos actualizados
     * @param  \App\Models\Sale  $sale  Modelo de venta a actualizar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sale $sale)
    {

        if (Auth::check()) {
            $sale->type = $request->type;
            $sale->net = $request->net;
            $sale->commission = $request->commission;
            $sale->comment = $request->comment;
            $sale->user_id = Auth::user()->id;
            $sale->customer_id = $request->customer;
            $sale->service_id = $request->service_id;
            $sale->save();
            return redirect()->route('sales.index');
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Elimina una venta de la base de datos (solo para administradores)
     *
     * @param  \App\Models\Sale  $sale  Modelo de venta a eliminar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sale $sale)
    {
        if (Auth::user()->rol == 'admin') {
            $sale->delete();
            return redirect()->route('sales.index', ['elim' => 1]);
        } else {
            return redirect()->route('indice');
        }
    }
}
