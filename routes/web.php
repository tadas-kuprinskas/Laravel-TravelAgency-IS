<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function(){
    Route::get('customer/{id}/travel', [App\Http\Controllers\CustomerController::class, 'travel'])->name('customer.travel');
    Route::get('/', [App\Http\Controllers\CustomerController::class, 'index']);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('country', App\Http\Controllers\CountryController::class);
    Route::resource('town', App\Http\Controllers\TownController::class);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
