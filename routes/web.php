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
    return 11;
});

Route::get('/login',array('as'=>'login',function(){
    return view('auth/login');
}));

Route::post('/welcome/login',  [AuthController::class, 'index'])->name('welcome.login');

Route::get('newtest/{slug}', [PhotoController::class, 'index']);

//Route::get('photo', 'App\Http\Controllers\PhotoController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function (){
    Route::get('/', function () {
        return '12323';
    });

    Route::get('/poys/{$pa}', function () {
        return view('welcome');
    })->name('funcheck');
});
