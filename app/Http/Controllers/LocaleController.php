<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function change($locale)
{
    if (!in_array($locale, array_keys(config('app.available_locales')))) {
        abort(400);
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);
    
    return redirect()->back();
}
}
