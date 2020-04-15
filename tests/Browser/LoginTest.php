<?php

namespace Tests\Browser;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @group login
     */
    public function testUserCanLogin()
    {
        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }

    /**
     * @group post-page
     */
    public function testUserCanViewAPost()
    {
        $post = factory(Post::class)->create();

        $this->browse(function(Browser $browser) use ($post) {
            $browser->visit('/posts')
                ->clickLink('View post details')
                ->assertPathIs("/post/{$post->id}")
                ->assertSee($post->title)
                ->assertSee($post->body)
                ->assertSee($post->createdAt());
        });

    }
}
