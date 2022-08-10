<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, User};

class UserController extends Controller
{
    public function show (User $author)
    {
	    return view('posts.index', [
		    'posts' => $author->posts
	    ]);
    }
}
