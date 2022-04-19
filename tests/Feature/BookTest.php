<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;

class BookTest extends TestCase
{
 
    use RefreshDatabase;

    public function testBookPageIsWorkingCorrectly()
    {
        $response = $this->get('/books');

        $response->assertSeeText('List of books');
        // $response->assertSeeText('Edit');
        // $response->assertSeeText('Delete');
        $response->assertSeeText('Books');
        $response->assertStatus(200);
    }


    public function testMessageNoBooks()
    {
        $response = $this->get('/books');
        $response->assertSeeText('No books registered');
    }

    public function testSeeBookFromDataBase()
    {
        // Arrange
        $book = new Book();
        $book->title = 'Aprenda a meditar';
        $book->year = 2999;
        $book->pages = 234;
        $book->save();

        // Act
        $response = $this->get('/books');

        // Assert
        $response->assertSeeText('Aprenda a meditar');
        $this->assertDatabaseHas('books', [
            'title'=>'Aprenda a meditar'
        ]);
    }
}
