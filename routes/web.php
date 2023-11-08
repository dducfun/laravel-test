<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login',[AuthController::class, 'login']);
Route::post('login',  [AuthController::class, 'index'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'create']);
Route::post('register', [AuthController::class, 'store'])->name('register');
