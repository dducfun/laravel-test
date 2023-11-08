<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\App;

Route::get('admin/login', [LoginController::class, 'show'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth.admin','prefix' => 'admin'], function (){
    App::setLocale('vn');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('profile', [PageController::class, 'profile'])->name('admin.profile');
    Route::post('profile', [PageController::class, 'editProfile'])->name('admin.profile');

    Route::get('page/{page}', [PageController::class, 'index'])->name('admin.page');
    Route::get('edit/{page}/{id}', [PageController::class, 'viewEdit'])->name('admin.edit');
    Route::post('edit/{page}/{id}', [PageController::class, 'edit'])->name('admin.edit');
    Route::post('delete/{page}/{id}', [PageController::class, 'delete'])->name('admin.delete');
});
