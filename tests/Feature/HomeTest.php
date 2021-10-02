<?php

namespace Tests\Feature;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');
        $response->assertSeeText('Hello World!!!');
        $response->assertSeeText('The current value is 1');
        $response->assertStatus(200);
    }

    public function testContactPageIsWorkingCorrectly(){
        
        $response = $this->get('/contact');
        $response->assertSeeText('Contact');
    }
}
