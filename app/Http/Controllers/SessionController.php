<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

	public function create ()
	{
		return view( 'session.create' );
	}

	public function store ()
	{
		$attributes = request()->validate([
			'email' => ['required', 'email'],
			'password' => ['required']
			]);

		if(! auth()->attempt($attributes))
		{
			return back()
				->withInput()
				->withErrors(['email' => 'Your provided credentials could not be verified.']);
		}

		session()->regenerate();
		session()->flash('success', 'You are Login.');
		return redirect( '/' );
	}

	public function destroy ()
	{
		auth()->logout();

		return redirect('/')->with('sucess', 'Goodbye!');
	}
}
