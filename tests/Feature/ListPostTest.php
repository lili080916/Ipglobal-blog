<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Post;

class ListPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_posts()
    {
        $user = User::factory()->create();
        $post = Post::factory()->times(3)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->getJson(route('api.post.index'));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [],[],[]
            ],
            'links' => [
                'self' => route('api.post.index'),
            ],
            'meta' => []
        ]);
    }

    /** @test */
    public function get_single_post_by_id()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->getJson(route('api.post.show', $post->getRouteKey()));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $post->getRouteKey(),
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => $post->user_id,
                'user' => [],
                'links' => [
                    'self' => route('api.post.show', $post->getRouteKey()),
                ]
            ]
        ]);
    }

    /** @test */
    public function create_post()
    {
        $user = User::factory()->create();
        $post = array(
            'user_id' => $user->id,
            'title' => 'test title',
            'body' => 'test body'
        );

        $response = $this->postJson(route('api.post.store', $post));

        $post = Post::first();

        $response->assertJson([
            'data' => [
                'id' => $post->getRouteKey(),
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => $post->user_id,
                'links' => [
                    'self' => route('api.post.show', $post->getRouteKey()),
                ]
            ]
        ]);
    }
}
