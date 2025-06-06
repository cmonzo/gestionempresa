<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para gestionar operaciones relacionadas con servicios
 * 
 * Maneja la creación, edición, visualización y eliminación de servicios
 * 
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Muestra un listado de todos los servicios ordenados por tipo
     *
     * @return \Illuminate\View\View Vista con el listado de servicios
     */
    public function index()
    {
        $services = Service::orderBy('type', 'ASC')->get();
        return view('services.index', compact('services'));
    }

    /**
     * Muestra el formulario para crear un nuevo servicio
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        if (Auth::check()) {
            $suppliers = Supplier::orderBy('name', 'ASC')->get();
            return view('services.create', compact('suppliers'));
        } else {
            return redirect()->route('indice');
        }
    }


    public function store(Request $request)
    {

    }

    /**
     * Muestra los detalles de un servicio específico
     *
     * @param  \App\Models\Service  $service  Modelo de servicio inyectado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Service $service)
    {
        if (Auth::check()) {
            return view('services.show', compact('service'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Muestra el formulario para editar un servicio existente
     *
     * @param  \App\Models\Service  $service  Modelo de servicio a editar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Service $service)
    {
        if (Auth::check()) {
            $suppliers = Supplier::orderBy('name', 'ASC')->get();
            return view('services.edit', compact('service', 'suppliers'));
        } else {
            return redirect()->route('indice');
        }
    }

    /**
     * Actualiza un servicio existente en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request  Datos actualizados
     * @param  \App\Models\Service  $service  Modelo de servicio a actualizar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        if (Auth::check()) {
            $service->type = $request->type;
            $service->iva = $request->iva;
            $service->save();

            return redirect()->route('services.index');
        } else {
            return redirect()->route('indice');
        }

    }

    /**
     * Elimina un servicio de la base de datos (solo para administradores)
     *
     * @param  \App\Models\Service  $service  Modelo de servicio a eliminar
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        if (Auth::user()->rol == 'admin') {
            $service->delete();
            return redirect()->route('services.index', ['elim' => 1]);
        } else {
            return redirect()->route('indice');
        }
    }
}
