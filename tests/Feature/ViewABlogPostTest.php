<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewABlogPostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     * @group view-post
     * @return void
     */
    public function testCanViewABlogPost()
    {

        //Artisan::call('migrate');
        // Arrangement
        // crear un post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);
        // Action
        $resp = $this->get("/post/{$post->id}");
        // visitar la ruta
        // Assert
        $resp->assertStatus(200);
        $resp->assertSee($post->title);
        $resp->assertSee($post->body);
        $resp->assertSee($post->created_at->toFormattedDateString());
    }

    /**
     * @group post-not-found
     */
    public function testViewsA404WhenPostIsNotFound(){
        //arrange
        //action
        $resp = $this->get('post/INVALID_ID');
        //assert
        $resp->assertStatus(404);
        $resp->assertSee("The page you are looking for could not be found");
    }
}
