<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\SubadminsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\BoardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\NotificationsController;
use App\Http\Controllers\Front\PostsController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\LikesController;

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

// Post Controller [ Just For Home Page => index Function ]
Route::get('/', [PostsController::class, 'index'])->name('front.home');

Route::get('/board', [BoardController::class, 'index'])->name('board.index');
Route::post('/board', [BoardController::class, 'store'])->name('board.store');


// Search Controller
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Follow Controller
Route::put('/follow', [FollowController::class, 'follow'])->name('follow');

// Likes Controller
Route::post('/like', [LikesController::class, 'like'])->name('like');
Route::post('/dislike', [LikesController::class, 'dislike'])->name('dislike');

// Notification Controller
Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.read');
// Start Posts Controller 
Route::namespace('Front')
    ->prefix('post')
    ->as('post.')
    ->group(function () {
        // Route::get('/', [PostsController::class, 'index'])->name('index');
        Route::get('/create', [PostsController::class, 'create'])->name('create');
        Route::post('/', [PostsController::class, 'store'])->name('store');
        Route::get('/{id}', [PostsController::class, 'show'])->name('show');
        Route::get('model/{id}', [PostsController::class, 'model'])->name('model');
        Route::get('/{id}/edit', [PostsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PostsController::class, 'update'])->name('update');
        Route::delete('/{id}', [PostsController::class, 'destroy'])->name('delete');
    });

// End Posts Controller

// Start Comment Controller 

Route::namespace('Front')
    ->prefix('comment')
    ->middleware('verified')
    ->as('comment.')
    ->group(function () {
        Route::post('/', [CommentController::class, 'store'])->name('store');
    });

// End Comment Controller 

// Start Profile Controller
Route::namespace('Front')
    ->prefix('profile')
    ->middleware(['auth'])
    ->group(function () {

        // Start Profile Route [ ProfileController ]
        Route::group([
            'as' => 'profile.'
        ], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'store'])->name('store');
            Route::get('/{id}', [ProfileController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('update');
            // Follow
            Route::get('/follow', [ProfileController::class, 'follow'])->name('follow');
        });
        // End Profile Route [ ProfileController ]
    });
// End Profile Route [ ProfileController ]

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/home', function () {
    return view('layouts.home');
})->middleware(['auth'])->name('login');

// Home Controller
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'redirect'])->name('admin.home');
Route::get('/{id}/edit', [HomeController::class, 'edit'])->middleware(['auth', 'redirect'])->name('edit');



Route::namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth', 'redirect'])
    ->group(function () {

        
        // Start Admin Dashboard [Roles]...
        Route::group([
            'prefix' => '/roles',
            'as' => 'role.',
        ], function () {
            // For Soft Delete ...
            Route::get('/trash', [RolesController::class, 'trash'])->middleware(['role'])->name('trash');
            Route::put('/trash/{id?}', [RolesController::class, 'restore'])->middleware(['role'])->name('restore');
            Route::delete('/admin/admins/trash/{id?}', [RolesController::class, 'forceDelete'])->middleware(['role'])->name('force-delete');
            // Basics Routes ...
            Route::get('/', [RolesController::class, 'index'])->middleware(['role'])->name('index');
            Route::get('/create', [RolesController::class, 'create'])->middleware(['role'])->name('create');
            Route::post('/', [RolesController::class, 'store'])->middleware(['role'])->name('store');
            Route::get('/{id}', [RolesController::class, 'show'])->middleware(['role'])->name('show');
            Route::get('/{id}/edit', [RolesController::class, 'edit'])->middleware(['role'])->name('edit');
            Route::put('/{id}', [RolesController::class, 'update'])->middleware(['role'])->name('update');
            Route::delete('/{id}', [RolesController::class, 'destroy'])->middleware(['role'])->name('delete');
        });
        // End Admin Dashboard [Roles]...

        // Start Admin Dashboard [Admins]...
        Route::group([
            'prefix' => '/admins',
            'as' => 'admin.',
        ], function () {
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
        ], function () {
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
        ], function () {
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
        ], function () {
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
        ], function () {
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
