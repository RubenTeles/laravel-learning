<?php

namespace Tests\Feature;

use Mockery;
use Mockery\MockInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
	public function actingAsNewUser(): User
	{
		$user = User::factory()->create();

		$this->actingAs($user);

		return $user;
	}


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	/** @test */
	public function a_user_can_create_a_post()
	{
		$user = $this->actingAsNewUser();

		$postsNumber = 1;
		$postData = ['number' => $postsNumber];

		$response = $this->actingAs($user)
		                 ->post('/posts/create', $postData);

		$response->assertStatus(302);
		$response->assertRedirect('/');

		$this->assertEquals(Post::where('user_id', $user->id)->count(), $postsNumber);
	}
}
