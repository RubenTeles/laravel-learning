<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category};

class CategoryController extends Controller
{

	public function show (Category $category)
	{
		return view('posts', [
			'posts' => $category->posts //Category::where('slug', $category)->firstOrFail()//$category
		]);
	}
}
