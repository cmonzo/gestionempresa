<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para manejar operaciones relacionadas con imágenes de servicios
 */
class ImageController extends Controller
{
    /**
     * Almacena una imagen y crea un nuevo registro de servicio asociado
     * 
     * Solo accesible para usuarios autenticados. Valida la imagen, crea el servicio,
     * asocia proveedores y almacena la imagen en el filesystem.
     *
     * @param  \Illuminate\Http\Request  $request  Contiene los datos del formulario y la imagen
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException Si falla la validación de la imagen
     */

    public function store(Request $request)
    {
        if (Auth::check()) {
            // 1. Validación de la imagen recibida
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',// 2MB máximo
            ]);
            // 2. Procesamiento de la imagen
            $image = $request->file('image');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();// Nombre único

            // 3. Creación del nuevo servicio
            $service = new Service();
            $service->type = $request->type;
            $service->iva = $request->iva;
            $service->photo = $fileName;
            $service->save();
            // 4. Asociación con proveedor
            $service->suppliers()->attach($request->supplier_id);
            // 5. Almacenamiento de la imagen
            $path = $image->storeAs('public/images', $fileName);// Guarda en storage/app/public/images

            // 6. Redirección con mensaje de éxito
            return redirect()->route('services.index');
        } else {
            return redirect()->route('indice');
        }
    }
}
