<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group formatted-date
     */
    public function testCanGetCreatedAtFormattedDate(){
        // arrange
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);
        // action
        $formattedDate = $post->createdAt();
        // assert
        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
