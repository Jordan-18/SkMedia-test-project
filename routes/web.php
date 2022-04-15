<?php

use App\Http\Controllers\ApproverController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RentalController;
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
    Route::put('/user/{id}', [UserController::class,'update'])->name('update-user');
    Route::delete('/user/{id}',[UserController::class,'destroy'])->name('delete-user');

    Route::get('/order',[OrderController::class,'index'])->name('index-order');
    Route::get('/order/create',[OrderController::class,'create'])->name('create-order');

    Route::post('/order/create',[OrderController::class, 'store'])->name('store-order');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('edit-order');
    Route::put('/order/edit/{id}', [OrderController::class, 'update'])->name('update-order');
    Route::delete('/order/{id}',[OrderController::class,'destroy'])->name('delete-order');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/approver',[ApproverController::class,'index'])->name('index-approver');
    Route::post('/approver/{id}',[ApproverController::class, 'action'])->name('action-approve');
    Route::get('/approver/link/{id}',[ApproverController::class,'driverlink'])->name('driver-link');
});