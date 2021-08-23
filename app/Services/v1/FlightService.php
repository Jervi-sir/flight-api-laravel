<?php

namespace App\Services\v1;

use App\Models\Flight;

class FlightService {
    public function getFlights()
    {
        return $this->filterFlights(Flight::all());
    }

    public function getFlight($flightNumber)
    {
        return $this->filterFlights(Flight::where('flightNumber', $flightNumber)->get());
    }

    protected function filterFlights($flights)
    {
        $data = [];

        foreach($flights as $flight)
        {
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                'href' => route('flights.show', [$flight->flightNumber])
            ];

            $data[] = $entry;
        }

        return $data;
    }
}
