<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCurrencies()
    {
        $response = $this->get('/api/currencies');

        $this->assertArrayHasKey('data', $response);
        $this->assertGreaterThanOrEqual(1, $response['data']);
        $response->assertStatus(200);
    }
}
