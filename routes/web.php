<?php

use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\SubadminsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\CartController;
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

// Front Controller
Route::get('/', [FrontController::class, 'index'])->name('front.home');

Route::get('/cart', [CartController::class, 'index']);

Route::namespace('Front')
    ->prefix('profile')
    ->middleware(['auth'])
    ->group(function () {

        // Start Profile Route [ ProfileController ]
        Route::group([
            'as' => 'profile.'
        ], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
        });
        // End Profile Route [ ProfileController ]
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('layouts.home');
})->middleware(['auth', 'redirect'])->name('login');

// Home Controller
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('admin.home');



Route::namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        // Start Admin Dashboard [Roles]...
        Route::group([
            'prefix' => '/roles',
            'as' => 'role.',
        ], function() {
            // For Soft Delete ...
            Route::get('/trash', [RolesController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [RolesController::class, 'restore'])->name('restore');
            Route::delete('/admin/admins/trash/{id?}', [RolesController::class, 'forceDelete'])->name('force-delete');
            // Basics Routes ...
            Route::get('/', [RolesController::class, 'index'])->name('index');
            Route::get('/create', [RolesController::class, 'create'])->name('create');
            Route::post('/', [RolesController::class, 'store'])->name('store');
            Route::get('/{id}', [RolesController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [RolesController::class, 'edit'])->name('edit');
            Route::put('/{id}', [RolesController::class, 'update'])->name('update');
            Route::delete('/{id}', [RolesController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [Roles]...

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

        // Start Admin Dashboard [ Categories ] ...
        Route::group([
            'prefix' => '/categories', // admin/Categories
            'as' => 'category.',
        ], function(){
            // For Soft Delete ...
            Route::get('/trash', [CategoriesController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [CategoriesController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [CategoriesController::class, 'forceDelete'])->name('force-delete');
            // Basics Route ...
            Route::get('/', [CategoriesController::class, 'index'])->name('index');
            Route::get('/create', [CategoriesController::class, 'create'])->name('create');
            Route::post('/', [CategoriesController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
            Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [ Categories ] ...

        // Start Admin Dashboard [ Image ] ...
        Route::group([
            'prefix' => '/images',
            'as' => 'image.'
        ], function() {
            // For Soft Delete ...
            Route::get('/trash', [ImagesController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [ImagesController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [ImagesController::class, 'forceDelete'])->name('force-delete');
            // Basics Route ...
            Route::get('/', [ImagesController::class, 'index'])->name('index');
            Route::get('/create', [ImagesController::class, 'create'])->name('create');
            Route::post('/', [ImagesController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ImagesController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ImagesController::class, 'update'])->name('update');
            Route::delete('/{id}', [ImagesController::class, 'destroy'])->name('delete');
        });
        // End Admin Dashboard [ Image ] ...

    });














