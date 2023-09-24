<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

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

 
Route::view('temp' , 'cms.temp');
Route::prefix('cms/admin/')->group(function (){
    Route::resource('deliveries', DeliveryController::class);
    Route::post('deliveries-update/{id}', [DeliveryController::class, 'update'])->name('deliveries-update');


    Route::resource('city', CityController::class);
    Route::post('city-update/{id}', [CityController::class, 'update'])->name('cities-update');


    Route::resource('countries', CountryController::class);
    Route::post('countries-update/{id}', [CountryController::class, 'update'])->name('countries-update');


    Route::resource('admins', AdminController::class);
    Route::post('admins-update/{id}', [AdminController::class, 'update'])->name('admins-update');


    Route::resource('orders', OrderController::class);
    Route::post('orders-update/{id}', [OrderController::class, 'update'])->name('orders-update');

});
