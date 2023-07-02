<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
	public function create ()
	{
		return view ('register.create');
	}

	public function store ()
	{
		$attributes = request()->validate([
			'name' => ['required', 'min:3', 'max:255'],
			'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
			'email' => ['required', 'email', 'unique:users,email'],
			'password' => ['required', 'min:7'],
			'image' => ['nullable', 'image', 'max:1024']
		]);

		if ($attributes['image'])
		{
			$extension = $attributes['image']->getClientOriginalExtension();
			$attributes['image'] = $attributes['image']->storeAs('users', "{$attributes['username']}.{$extension}");
		}

		$user = User::create($attributes);

		auth()->login($user);

		session()->flash('success', 'Your account has been created.');

		return redirect('/');
	}
}
