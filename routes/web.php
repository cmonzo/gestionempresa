<?php

use Illuminate\Support\Facades\Route;
use App\Models\Thread;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('index');
})->name('indice');*/
Route::get('/',[StaticController::class, 'index'])->name('indice');
Route::get('contact',[StaticController::class, 'contact'])->name('contacto');
Route::get('quienes',[StaticController::class, 'who'])->name('quienes');
Route::post('contact',[StaticController::class, 'send']);
Route::get('registro',[LoginController::class,'registerForm']);
Route::post('registro',[LoginController::class,'register'])->name('registro');
Route::get('login',[LoginController::class,'loginForm']);
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::resource('users', UserController::class);
Route::resource('services', ServiceController::class);
Route::resource('customers', CustomerController::class);
Route::resource('sales', SaleController::class);
Route::resource('suppliers', SupplierController::class);

Route::get('cuenta', function(){
    return view('auth.account');
})->name('users.account')->middleware('auth');

