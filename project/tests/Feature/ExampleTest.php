<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBookTitleCanBeSeenOnTitlePage()
    {
        //arrange
        $author = Author::factory()->create();
        Book::factory()->create([
            'title'=> 'The Cat Who Said Cheese',
            'author_id' => $author->id,
        ]);

        //action
        $response = $this->get('/books');

        //assert
        $response->assertStatus(200);
        $response->assertSee('The Cat Who Said Cheese');
    }
}
