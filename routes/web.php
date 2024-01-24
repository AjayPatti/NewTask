<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[LoginController::class,'index']);


Auth::routes();
Route::post('/login',[LoginController::class,'loginSecond'])->name('login');
Route::get('/register',[RegisterController::class,'Register'])->name('register');
Route::post('/store',[RegisterController::class,'Store'])->name('store');


Route::group(['middleware'=>['web','isAdmin']],function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/customer',[AdminController::class,'Customer'])->name('customer');
    Route::get('/add',[AdminController::class,'add'])->name('add');
    Route::get('/edit',[AdminController::class,'edit'])->name('edit');
    Route::post('/add-store',[AdminController::class,'AddEmployee'])->name('add-customer');
    Route::post('/update',[AdminController::class,'UpdateStore'])->name('update');
    Route::post('/reject',[AdminController::class,'Reject'])->name('reject');
    
    // Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});