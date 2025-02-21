<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);
Route::get('customer/trash' , [CustomerController::class , 'softdelete'])->name('customers.soft');
Route::get('customers/restore/{id}' , [CustomerController::class , 'restore'])->name('customers.restore');
Route::delete('customers/trash/{id}' , [CustomerController::class , 'forceDestroy'])->name('customers.forceDestroy');