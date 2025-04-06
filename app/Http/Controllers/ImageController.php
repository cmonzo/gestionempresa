<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $service = new Service();
            $service->type = $request->type;
            $service->iva = $request->iva;
            $service->save();
    
        $path = $request->file('image')->store('public/img');
        $url = Storage::url($path);
    
        return back()->with('success', 'Imagen subida correctamente')
                    ->with('image', $url);
    }
}
