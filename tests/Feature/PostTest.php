<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BlogPost;
use Illuminate\Contracts\Auth\Authenticatable;   


class PostTest extends TestCase
{

    use RefreshDatabase;

    public function testNoBlogPostWhenNothingInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No posts found');

    }

    public function testIfThereArePost()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = 'La Cobra';
        $post->content = 'La Cobra is a movie that...';
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assertion
        $response->assertSeeText('La Cobra');

        $this->assertDatabaseHas( 'blog_posts',
               ['title' =>'La Cobra']
        );
    }


    public function testStoreValid(){

        $user = $this->user();

        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters' 
        ];

        $this->actingAs($user)
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');
        
        $this->assertEquals(session('status'), 'The blog post was created');
    }

    public function testStoreFail(){

        $params = [
            'title' => 'x',
            'content' => 'x'
        ]; 

        $this->actingAs($this->user())
        ->post('/posts', $params)
        ->assertStatus(302)
        ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');

        // dd($messages->getMessages());
    }
}
