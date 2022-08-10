<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category};

class PostController extends Controller
{
	public function index ()
	{
		return view('posts.index', [
			'posts' => Post::latest()
			               ->filter(request(['search', 'category', 'author']))
			               ->simplepaginate(6)->withQueryString()
		]);
	}

	public function show (Post $post)
	{
		//Post::where('slug', $post)->firstOrFail()
		return view('posts.show', [
			'post' => $post
		]);
	}

}
