<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/category/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'current' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/authors/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all()
    ]);
})->name('authors');