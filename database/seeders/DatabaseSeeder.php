<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Customer;
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
        Airport::factory(5)->create();
        Flight::factory(5)->create()->each(function($flight) {
            Customer::factory(100)->make()->each(function($customer) use($flight) {
                $flight->passengers()->save($customer);
            });
        });
    }
}
