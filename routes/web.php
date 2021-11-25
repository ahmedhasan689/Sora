<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\HomeController;
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

Route::get('/', function () {
    return view('layouts.home');
});

// Home Controller
Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');

// For Admin Dashboard [Admins]...
Route::get('/admin/admins', [AdminsController::class, 'index'])->name('admin.index');
Route::get('/admin/admins/create', [AdminsController::class, 'create'])->name('admin.create');
Route::post('/admin/admins', [AdminsController::class, 'store'])->name('admin.store');
Route::get('/admin/admins/{id}', [AdminsController::class, 'show'])->name('admin.show');
Route::get('/admin/admins/{id}/edit', [AdminsController::class, 'edit'])->name('admin.edit');
Route::put('/admin/admins/{id}', [AdminsController::class, 'update'])->name('admin.update');
Route::delete('/admin/admins/{id}', [AdminsController::class, 'destroy'])->name('admin.delete');




