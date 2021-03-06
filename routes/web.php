<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [PizzaController::class, 'index'])->name('dashboard');
Route::get('/create', [PizzaController::class, 'create'])->name('orders.create');
Route::post('/create/order', [PizzaController::class, 'store'])->name('orders.store');
