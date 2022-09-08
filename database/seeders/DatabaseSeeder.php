<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
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
        Route::factory(10)->create();

        Client::factory(30)
            ->create()
            ->each(function ($client) {
                Address::factory(rand(1, 3))
                    ->create(['client_id' => $client->id])
                    ->each(function ($address) {
                        Delivery::factory(rand(2, 4))
                            ->create(['address_id' => $address->id])
                            ->each(function ($delivery) {
                                DeliveryLine::factory(rand(1, 4))
                                    ->create(['delivery_id' => $delivery->id]);
                            });
                    });
            });
    }
}
