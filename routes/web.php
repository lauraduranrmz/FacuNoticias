<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class, 'homepage'])->name('homepage');



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

route::get('/post_page',[AdminController::class, 'post_page'])->name('post_page');

route::post('/add_post',[AdminController::class, 'add_post']);