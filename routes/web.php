<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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
})->middleware('auth');

Route::get('/login',array('as'=>'login',function(){
    return view('auth/login');
}));

Route::post('/welcome/login', function(){
    if(!empty($_REQUEST['_method']) && $_REQUEST['_method'] == 'POST'){
        return 'check';
    }
    return 2;
})->name('welcome.login');

Route::get('newtest/{slug}', [PhotoController::class, 'index']);

//Route::get('photo', 'App\Http\Controllers\PhotoController@index');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', function () {
        return '12323';
    });

    Route::get('/poys/{$pa}', function () {
        return view('welcome');
    })->name('funcheck');
});
