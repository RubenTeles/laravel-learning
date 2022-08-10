<?php

use App\Http\Controllers\{PostController, CategoryController, UserController,
	TaskController, RegisterController, SessionController};
use App\Models\{Post, Category, User};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');



//Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

//Route::get('authors/{author:username}', [UserController::class, 'show']);

Route::post('/', function () {
	//Post::create(
	//    'title' => request('title'),
	//    'body' => '<p>' . request('body') . '</p>',
	//    'excerpt' => request('excerpt')
	//);
	//ddd(request('body'));
	$post = new Post();

	$post->title = request('title');
	$post->body = '<p>' . request('body') . '</p>';
	$post->excerpt = substr(request('body'), 0, 10);;
	$post->slug = str_replace(' ', '-', strtolower(request('title')));
	$post->save();

	return back();
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'create_task'])->middleware('auth');;

