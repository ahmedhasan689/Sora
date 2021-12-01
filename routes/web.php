<?php

use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\SubadminsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
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
    // For Soft Delete ...
Route::get('/admin/admins/trash', [AdminsController::class, 'trash'])->name('admin.trash');
Route::put('/admin/admins/trash/{id?}', [AdminsController::class, 'restore'])->name('admin.restore');
Route::delete('/admin/admins/trash/{id?}', [AdminsController::class, 'forceDelete'])->name('admin.force-delete');
    // Basics Routes ...
Route::get('/admin/admins', [AdminsController::class, 'index'])->name('admin.index');
Route::get('/admin/admins/create', [AdminsController::class, 'create'])->name('admin.create');
Route::post('/admin/admins', [AdminsController::class, 'store'])->name('admin.store');
Route::get('/admin/admins/{id}', [AdminsController::class, 'show'])->name('admin.show');
Route::get('/admin/admins/{id}/edit', [AdminsController::class, 'edit'])->name('admin.edit');
Route::put('/admin/admins/{id}', [AdminsController::class, 'update'])->name('admin.update');
Route::delete('/admin/admins/{id}', [AdminsController::class, 'destroy'])->name('admin.delete');

// For Admin Dashboard [ Sub-admin ] ...
    // For Soft Delete ...
Route::get('/admin/subadmins/trash', [SubadminsController::class, 'trash'])->name('subadmin.trash');
Route::put('/admin/subadmins/trash/{id?}', [SubadminsController::class, 'restore'])->name('subadmin.restore');
Route::delete('/admin/subadmins/trash/{id?}', [SubadminsController::class, 'forceDelete'])->name('subadmin.force-delete');
    // Basics Routes
Route::get('/admin/subadmins', [SubadminsController::class, 'index'])->name('subadmin.index');
Route::get('/admin/subadmins/create', [SubadminsController::class, 'create'])->name('subadmin.create');
Route::post('/admin/subadmins', [SubadminsController::class, 'store'])->name('subadmin.store');
Route::get('/admin/subadmins/{id}/edit', [SubadminsController::class, 'edit'])->name('subadmin.edit');
Route::put('/admin/subadmins/{id}', [SubadminsController::class, 'update'])->name('subadmin.update');
Route::delete('/admin/subadmins/{id}', [SubadminsController::class, 'destroy'])->name('subadmin.delete');

// For Admin Dashboard [ Users ] ...
    // For Soft Delete ...
Route::get('/admin/users/trash', [UsersController::class, 'trash'])->name('user.trash');
Route::put('/admin/users/trash/{id?}', [UsersController::class, 'restore'])->name('user.restore');
Route::delete('/admin/users/trash/{id?}', [UsersController::class, 'forceDelete'])->name('user.force-delete');
    // Basics Route ...
Route::get('/admin/users', [UsersController::class, 'index'])->name('user.index');
Route::get('/admin/users/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/admin/users', [UsersController::class, 'store'])->name('user.store');
Route::get('/admin/users/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('user.delete');
















