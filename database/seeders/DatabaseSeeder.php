<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $plans = array(
            [
                'name' => 'Free',
                'price' => 0.00
            ],
            [
                'name' => 'Business',
                'price' => 99.90
            ],
            [
                'name' => 'Premium',
                'price' => 199.90
            ]
        );

        foreach ($plans as $plan) {
            \App\Models\Plan::create($plan);
        }
    }
}
