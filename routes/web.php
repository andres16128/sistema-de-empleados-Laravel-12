<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home')->middleware('auth');
Route::resource('empleados', EmpleadoController::class)->middleware('auth');