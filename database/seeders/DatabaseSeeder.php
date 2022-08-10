<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\{User, Category, Post};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		//User::truncate();
		Category::truncate();
		Post::truncate();

	    $user = User::factory()->create([
			'name' => 'Ruben Teles',
		    'username' => 'RubenTeles'
	    ]);

	    $family = Category::create([
		    'name' => 'Family',
		    'slug' => 'family'
	    ]);

	    $hobbies = Category::create([
		    'name' => 'Hobbies',
		    'slug' => 'hobbies'
	    ]);

	    $work = Category::create([
		    'name' => 'Work',
		    'slug' => 'work'
	    ]);

		Post::factory(10)->create([
			'user_id' => $user->id,
			'category_id' => $hobbies->id
		]);

	   // $user_id = User::factory('App\Location')->create(['id' => $user->id]);


	    //$user = User::factory(1)->create(['event_id' => $event->id]);



		Post::create([
			'user_id' => $user->id,
			'category_id' => $family->id,
			'title' => 'My Family Post',
			'slug' => 'my-first-post',
			'excerpt' => '<p>Family family asjdaijsdjiawo</p>',
			'body' => '<p>Family family asjdaijsdjiawo Family family asjdaijsdjiawoFamily family asjdaijsdjiawoFamily family asjdaijsdjiawoFamily family asjdaijsdjiawoFamily family asjdaijsdjiawo.</p>',
			'published_at' => today(),
		]);

	    Post::create([
		    'user_id' => $user->id,
		    'category_id' => $work->id,
		    'title' => 'My Work Post',
		    'slug' => 'my-second-post',
		    'excerpt' => '<p>Work Work asjdaijsdjiawo</p>',
		    'body' => '<p>Work Work asjdaijsdjiawo Work Work asjdaijsdjiawo Work Work asjdaijsdjiawoasjdaijsdjiawo.</p>',
		    'published_at' => today(),
	    ]);

	    Post::create([
		    'user_id' => $user->id,
		    'category_id' => $hobbies->id,
		    'title' => 'My Hobbies Post',
		    'slug' => 'my-third-post',
		    'excerpt' => '<p>Hobbies Hobbies asjdaijsdjiawo</p>',
		    'body' => '<p>Hobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawoHobbies Hobbies asjdaijsdjiawo asjdaijsdjiawo.</p>',
		    'published_at' => today(),
	    ]);
    }
}
