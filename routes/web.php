<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function () {
    Route::get('/plans/{plan}', [App\Http\Controllers\PlanController::class, 'show'])->name("plans.show");
    Route::get('/purchase', [App\Http\Controllers\HomeController::class, 'purchase'])->name('purchase');
    Route::post('subscription', [App\Http\Controllers\PlanController::class, 'subscription'])->name("subscription.create");
    Route::get('/assignAdminRole', [App\Http\Controllers\HomeController::class, 'assignAdminRole'])->name('assignAdminRole');
    Route::get('/cancel_subscription', [App\Http\Controllers\PlanController::class, 'cancel_subscription'])->name('cancel_subscription');
    

});

Route::group(['middleware' => ['role:super_admin']], function () {
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/cancel/{id}', [App\Http\Controllers\AdminController::class, 'cancel'])->name('admin.cancel');    
});
