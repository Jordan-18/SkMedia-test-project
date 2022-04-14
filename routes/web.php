<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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


Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified','admin'])->group(function (){
    Route::get('/user',[UserController::class, 'create'])->name('create-user');
    Route::post('/user',[LoginController::class,'register'])->name('register');
    
    Route::get('/users',[UserController::class, 'index'])->name('users');
    Route::get('/user/{slug}',[UserController::class, 'edit'])->name('edit-user');
    Route::put('/user/{id}', [UserController::class,'store'])->name('store-user');
    Route::delete('/user/{id}',[UserController::class,'destroy'])->name('delete-user');
});