<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comment-store');

Route::post('newsletter', NewsletterController::class)->name('newsletter');

Route::get('register', [RegisterController::class, 'create'])
    ->name('register-create')
    ->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])
    ->name('register-store')
    ->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

Route::get('login', [SessionController::class, 'create'])
    ->name('login-create')
    ->middleware('guest');

Route::post('login', [SessionController::class, 'store'])
    ->name('login-store')
    ->middleware('guest');

Route::get('admin/posts/create', [PostController::class, 'create'])
    ->name('post-create')
    ->middleware('admin');

Route::get('admin/posts', [AdminController::class, 'index'])
    ->name('admin-post-show')
    ->middleware('admin');

Route::post('admin/posts', [PostController::class, 'store'])
    ->name('post-store')
    ->middleware('admin');