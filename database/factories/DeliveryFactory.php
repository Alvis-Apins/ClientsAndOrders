<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'route_id' => rand(1,5),
            'type' => rand(1,2),
            'status' => rand(1,3),
            'created_at' => now()->subDays(rand(5,10)),
            'updated_at' => now()->subDays(rand(1,5))->subMinutes(rand(1,60))
        ];
    }
}
