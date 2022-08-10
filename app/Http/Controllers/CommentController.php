<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use function back;

class CommentController extends Controller
{
	public function store (Post $post )
	{

		request()->validate([
			'body' => ['required', 'min:3', 'max:255']
		]);

		Comment::create([
			'body' => request('body'),
			'user_id' => auth()->id(),
			'post_id' => $post->id
		]);

		return back();
	}
}
