<?php

namespace AfzalSabbir\SSLaraCommerz\Tests\Feature;

use AfzalSabbir\SSLaraCommerz\Tests\TestCase;

class ExampleTest extends TestCase
{
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
}
