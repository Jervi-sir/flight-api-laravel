<?php

namespace Database\Factories;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\CarbonInterval;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $flightHours = $this->faker->numberBetween(1, 5);
        $flightTime = new CarbonInterval('PT' . $flightHours . 'H');
        $arrival = $this->faker->dateTime;
        $depart = clone $arrival;
        $depart->sub($flightTime);


        return [
            'flightNumber' => $this->faker->regexify('[A-Z]{3}') . $this->faker->unique()->randomNumber(5),
            'arrivalAirport_id' => $this->faker->numberBetween(1, 5),
            'arrivalDateTime' => $arrival,
            'departureAirport_id' => $this->faker->numberBetween(1, 5),
            'departureDateTime' => $depart,
            'status' => $this->faker->boolean ? "ontime" : "delayed",

        ];
    }
}
