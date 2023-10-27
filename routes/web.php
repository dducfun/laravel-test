<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\PageController;

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

Route::get('admin/login', [LoginController::class, 'show'])->name('admin.login');
Route::post('admin/login-submit', [LoginController::class, 'login'])->name('admin.submit');
Route::group(['middleware' => 'auth.admin','prefix' => 'admin'], function (){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('profile', [PageController::class, 'profile'])->name('admin.profile');
    Route::get('page', [PageController::class, 'index'])->name('admin.page');
    Route::get('rtl', [PageController::class, 'rtl'])->name('admin.rtl');
    Route::get('sign-in-static', [PageController::class, 'signin'])->name('admin.sign-in-static');
    Route::get('sign-up-static', [PageController::class, 'sign-up-static'])->name('admin.sign-up-static');
    Route::get('profile-static', [PageController::class, 'profile'])->name('admin.profile-static');
});
