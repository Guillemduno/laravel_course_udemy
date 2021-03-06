<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\BookComment;

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

    public function testSeeBookFromDataBaseWithNoComments()
    {
        // Arrange
        $book = $this->saveBookIntoDataBase();

        // Act
        $response = $this->get('/books');

        // Assert
        $response->assertSeeText('Aprenda a meditar');
        $response->assertSeeText('No comments yet!');
        $this->assertDatabaseHas('books', [
            'title'     => 'Aprenda a meditar',
            'year'      => 2999,
            'pages'     => 234
        ]);
    }

    public function testSeeBookFromDataBaseWithComments(){
        // Arrange
        $book = $this->saveBookIntoDataBase();
        BookComment::factory()->count(5)->create(['book_id' => $book->id]);

        // Act
        $response = $this->get('/books');

        // Assert
        $response->assertSeeText('5 comments');
    }

    public function test200 (){

     $this->get('/books')->assertOk();
    }

    public function testStoreValid(){

        $params = [
            'title' => 'Valid title',
            'year' => 2,
            'pages' => 444
        ];

        $this->post('/books', $params)
                ->assertStatus(302)
                ->assertSessionHas('status');

        $this->assertEquals(session('status'), "The book 'Valid title' was created");
    }

    public function testStoreFailure(){
        $params = [
            'title' => 'Th',
            'year' => '',
            'pages' => ''      
        ];

        $this->post('/books', $params)
                ->assertStatus(302)
                ->assertSessionHas('errors');
        
        $messages = session('errors')->getMessages();
        // dd($messages);
        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['year'][0], 'The year field is required.');
        $this->assertEquals($messages['pages'][0], 'The pages field is required.');
    }

    public function testBookUpdate(){

        $book = $this->saveBookIntoDataBase();

        $this->assertDatabaseHas('books', [
            'title'     => 'Aprenda a meditar',
            'year'      => 2999,
            'pages'     => 234
        ]);

        $params = [
            'title' => 'Nunca contigo 2',
            'year' => 2029,
            'pages' => 143
        ];

        $this->put("/books/{$book->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), "The book 'Nunca contigo 2' was edited");

        $this->assertDatabaseMissing('books', $book->toArray());
        $this->assertDatabaseHas('books', [
            'title' => 'Nunca contigo 2',
            'year' => 2029,
            'pages' => 143
        ]);

    }

    public function testDeleteBook()
    {
        $book = $this->saveBookIntoDataBase();

        $this->assertDatabaseHas('books', [
            'title'     => 'Aprenda a meditar',
            'year'      => 2999,
            'pages'     => 234
        ]);

        $this->delete("books/{$book->id}", )
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), "The book 'Aprenda a meditar' was deleted!");

        $this->assertDatabaseMissing('books', $book->toArray());
    }

    private function saveBookIntoDataBase():Book
    {
        // $book = new Book();
        // $book->title = 'Aprenda a meditar';
        // $book->year = 2999;
        // $book->pages = 234;
        // $book->save();

        return Book::factory()->newTestBook()->create();
        // return $book;
    }
}
