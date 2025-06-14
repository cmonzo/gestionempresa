<?php

use App\Http\Middleware\LocaleCookieMiddleware;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\Thread;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocaleController;


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

Route::get('/change-locale/{locale}', [LocaleController::class, 'change'])
    ->name('locale.change');
Route::get('/', [StaticController::class, 'index'])->name('indice');
Route::get('contact', [StaticController::class, 'contact'])->name('contacto');
Route::get('quienes', [StaticController::class, 'who'])->name('quienes');
Route::post('contact', [StaticController::class, 'send']);

Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::resource('services', ServiceController::class);

Route::middleware(['auth'])->group(function () {    
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::post('showSaleClient', [SaleController::class, 'showSaleClient'])->name('showSaleClient');
    Route::resource('sales', SaleController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('suppliers', SupplierController::class);
    Route::get('cuenta', function () {
        return view('auth.account');
    })->name('users.account')->middleware('auth');

});

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('registro', [LoginController::class, 'registerForm']);
    Route::post('registro', [LoginController::class, 'register'])->name('registro');
    Route::put('/users/update-worker/{user}', [UserController::class, 'updateWorker'])->name('updateWorker');
    Route::resource('users', UserController::class);
});

/*
Route::get('/locale/{locale}',function($locale){
    return redirect()->back()->withCookie('locale',$locale);
});

Route::middleware(LocaleCookieMiddleware::class)->group(function(){
    
});

Route::prefix('{locale}')->middleware(LocaleMiddleware::class)->group(function(){
    Route::get();
});
*/
//se comenta porque se inicio el proceso para la localización pero no ha dado tiempo