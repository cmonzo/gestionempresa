<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('image');
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();

        $service = new Service();
        $service->type = $request->type;
        $service->iva = $request->iva;
        $service->photo=$fileName;
        $service->save();
        
        

        //$path = $request->file('image')->store('public/img');
        $path = $image->storeAs('public/images', $fileName);
        //$url = Storage::url($path);

        return redirect()->route('services.index');
    }
    else{
        return redirect()->route('indice');
    }
    }
}
