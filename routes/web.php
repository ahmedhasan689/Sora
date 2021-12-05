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

/* Route::get('/', function () {
        return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('layouts.home');
})->middleware(['auth']);

// Home Controller
Route::get('/', [HomeController::class, 'index'])->middleware(['auth'])->name('admin.home');



Route::namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth'])
    ->group(function () {


        // Start Admin Dashboard [Admins]...
        Route::group([
            'prefix' => '/admins',
            'as' => 'admin.',
        ], function() {
            // For Soft Delete ...
            Route::get('/trash', [AdminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [AdminsController::class, 'restore'])->name('restore');
            Route::delete('/admin/admins/trash/{id?}', [AdminsController::class, 'forceDelete'])->name('force-delete');
            // Basics Routes ...
            Route::get('/', [AdminsController::class, 'index'])->name('index');
            Route::get('/create', [AdminsController::class, 'create'])->name('create');
            Route::post('/', [AdminsController::class, 'store'])->name('store');
            Route::get('/{id}', [AdminsController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AdminsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminsController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminsController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [Admins]...

        // Start Admin Dashboard [ Sub-admin ] ...
        Route::group([
            'prefix' => '/subadmins',
            'as' => 'subadmin.',
        ], function() {
            // For Soft Delete ...
            Route::get('/trash', [SubadminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [SubadminsController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [SubadminsController::class, 'forceDelete'])->name('force-delete');
            // Basics Routes
            Route::get('/', [SubadminsController::class, 'index'])->name('index');
            Route::get('/create', [SubadminsController::class, 'create'])->name('create');
            Route::post('/', [SubadminsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [SubadminsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SubadminsController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubadminsController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [ Sub-admin ] ...

        // Start Admin Dashboard [ Users ] ...
        Route::group([
            'prefix' => '/users', // admin/users
            'as' => 'user.',
        ], function(){
            // For Soft Delete ...
            Route::get('/trash', [UsersController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [UsersController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [UsersController::class, 'forceDelete'])->name('force-delete');
            // Basics Route ...
            Route::get('/', [UsersController::class, 'index'])->name('index');
            Route::get('/create', [UsersController::class, 'create'])->name('create');
            Route::post('/', [UsersController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
            Route::put('/{id}', [UsersController::class, 'update'])->name('update');
            Route::delete('/{id}', [UsersController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [ Users ] ...

    });














