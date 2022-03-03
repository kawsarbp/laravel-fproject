<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/post', [SiteController::class, 'singlepost'])->name('single-post');

Route::prefix('user')->name('user.')->group(function () {
//user login
    Route::get('/login', [SiteController::class, 'userLogin'])->name('loginForm');
    Route::post('/login', [SiteController::class, 'login'])->name('login');
    Route::post('/logout', [SiteController::class, 'logout'])->name('logout');
//user register
    Route::get('/register', [SiteController::class, 'userRegister'])->name('registerForm');
    Route::post('/register', [SiteController::class, 'registration'])->name('registration');
});
//backend
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/single-item/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('/edit-item/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/kawsar/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
    //post
    Route::resource('post',PostController::class);
});
