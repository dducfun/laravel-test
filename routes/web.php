<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\PageController;
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

Route::get('admin/login', [LoginController::class, 'show'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth.admin','prefix' => 'admin'], function (){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('profile', [PageController::class, 'profile'])->name('admin.profile');

    Route::get('page/{page}', [PageController::class, 'index'])->name('admin.page');
    Route::get('edit/{page}/{id}', [PageController::class, 'edit'])->name('admin.edit');
    Route::post('delete/{page}/{id}', [PageController::class, 'delete'])->name('admin.delete');

    Route::get('rtl', [PageController::class, 'rtl'])->name('admin.rtl');
    Route::get('profile-static', [PageController::class, 'profile'])->name('admin.profile-static');
});
