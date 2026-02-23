<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        // Como a rota / redireciona (login ou dashboard), o correto é 302
        $response->assertStatus(302);

        // opcional: garantir que está indo pro login (quando não autenticado)
        $response->assertRedirect(route('login'));
    }
}
