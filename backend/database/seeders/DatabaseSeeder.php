<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Repositories\Models\Currency::factory()->create([
            'code' => 'BRL',
            'name' => 'Real Brasileiro',
            'show' => 0
        ]);

        \App\Repositories\Models\Currency::factory()->create([
            'code' => 'USD',
            'name' => 'Dólar Americano',
            'show' => 1
        ]);

        \App\Repositories\Models\Currency::factory()->create([
            'code' => 'EUR',
            'name' => 'Euro',
            'show' => 1
        ]);

        \App\Repositories\Models\PaymentMethod::factory()->create([
            'name' => 'Boleto',
            'rate' => 0.0145
        ]);

        \App\Repositories\Models\PaymentMethod::factory()->create([
            'name' => 'Cartão de Crédito',
            'rate' => 0.0763
        ]);
    }
}
