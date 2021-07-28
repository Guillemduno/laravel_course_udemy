<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BlogPost;    

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
}
