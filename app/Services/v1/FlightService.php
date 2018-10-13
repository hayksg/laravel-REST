<?php

namespace App\Services\v1;

use App\Flight;

class FlightService
{
    public function getFlights()
    {
        $data = Flight::all();
        return $this->filterFlights($data);
    }

    public function getFlight($flightNumber)
    {
        $data = Flight::where('flightNumber', $flightNumber)->get();
        return $this->filterFlights($data);
    }

    protected function filterFlights($flights)
    {
        $data = [];

        foreach ($flights as $flight) {
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                'href' => route('flights.show', ['id' => $flight->flightNumber]),
            ];

            $data[] = $entry;
        }

        return $data;
    }
}
