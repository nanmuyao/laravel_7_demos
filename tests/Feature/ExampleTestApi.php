<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTestApi extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('api/example');
        dump("Testing API endpoint: /api/example");
        $response->assertJson(['message' => 'This is an example API endpoint']);
        dump("Response received: " . $response->getContent());
        dump("Asserting status code is 200...");
        $this->assertTrue($response->isSuccessful(), 'Response was not successful');


        $response->assertStatus(200);
    }
}
