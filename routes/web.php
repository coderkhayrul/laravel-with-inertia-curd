<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return Inertia::render('create');
    return view('welcome');
});

Route::get('customers',[CustomerController::class,'index'])->name('customer.index');
Route::get('customers/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('customers',[CustomerController::class,'store'])->name('customer.store');
Route::get('customers/{customer}/edit',[CustomerController::class,'edit'])->name('customer.edit');
Route::put('customers/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::delete('customers/{customer}',[CustomerController::class,'destroy'])->name('customer.destroy');
