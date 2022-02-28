<?php
use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/',[SiteController::class,'index'])->name('home');
Route::get('/post',[SiteController::class,'singlepost'])->name('single-post');


Route::prefix('user')->name('user.')->group(function (){
//user login
    Route::get('/login',[SiteController::class,'userLogin'])->name('loginForm');
    Route::post('/login',[SiteController::class,'login'])->name('login');
    Route::get('/logout',[SiteController::class,'logout'])->name('logout');
//user register
    Route::get('/register',[SiteController::class,'userRegister'])->name('registerForm');
    Route::post('/register',[SiteController::class,'registration'])->name('registration');
});
