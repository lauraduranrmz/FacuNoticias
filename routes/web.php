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

route::get('/show_post',[AdminController::class, 'show_post'])->name('show_post');

route::get('/delete_post/{id}',[AdminController::class, 'delete_post']);

route::get('/edit_page/{id}',[AdminController::class, 'edit_page']);

route::post('/update_post/{id}',[AdminController::class, 'update_post']);

route::get('/post_details/{id}',[HomeController::class, 'post_details']);

route::get('/create_post',[HomeController::class, 'create_post'])->middleware('auth');

route::post('/user_post',[HomeController::class, 'user_post'])->middleware('auth');

route::get('/my_post',[HomeController::class, 'my_post'])->middleware('auth');

route::get('/my_post_del/{id}',[HomeController::class, 'my_post_del'])->middleware('auth');

route::get('/post_update_page/{id}',[HomeController::class, 'post_update_page'])->middleware('auth');

route::post('/update_post_data/{id}',[HomeController::class, 'update_post_data'])->middleware('auth');

route::get('/accept_post/{id}',[AdminController::class, 'accept_post']);

route::get('/reject_post/{id}',[AdminController::class, 'reject_post']);