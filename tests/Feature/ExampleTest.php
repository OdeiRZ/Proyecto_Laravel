<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        // Esperemos que la respuesta de la raiz sea un estado 200
        $response->assertStatus(200);
        // Buscamos el texto Laravel en la raiz del proyecto /
        $response->assertSee('Laravel');
    }

    public function testCanSearchForMessage()
    {
        $response = $this->get('/messages?query=Odei');
        $response->assertSee('Odei');
    }
}
