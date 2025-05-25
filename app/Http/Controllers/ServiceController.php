<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('type', 'ASC')->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            $path = $request->file('image')->store('public/img');
            $url = Storage::url($path);
        
            
            $service = new Service();
            $service->type = $request->type;
            $service->iva = $request->iva;
            $service->save();
            return back()->with('success', 'Imagen subida correctamente')
                     ->with('image', $url);
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
