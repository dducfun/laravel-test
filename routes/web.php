<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\User\AuthController;

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

Route::get('/', function (){
    return auth()->user();
});

Route::get('/login',[AuthController::class, 'login']);
Route::post('login',  [AuthController::class, 'index'])->name('login');

Route::get('/register', [AuthController::class, 'create']);
Route::post('register', [AuthController::class, 'store'])->name('register');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function (){
    Route::get('/', function () {
        return '12323';
    });

    Route::get('/poys/{$pa}', function () {
        return view('welcome');
    })->name('funcheck');
});
