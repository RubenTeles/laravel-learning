<?php

use App\Http\Controllers\{CommentController,
	NewsletteController,
	PostController,
	CategoryController,
	UserController,
	TaskController,
	RegisterController,
	SessionController};
use App\Models\{Comment, Post, Category, User};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/create/{number?}', [PostController::class, 'create'])
     ->name('posts.create')
     ->middleware('auth');


Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('newsletter', NewsletteController::class);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');



//Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

//Route::get('authors/{author:username}', [UserController::class, 'show']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'create_task'])->middleware('auth');;

