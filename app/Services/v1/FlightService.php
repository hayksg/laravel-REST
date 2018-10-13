<?php

namespace App\Services\v1;

use App\Flight;

class FlightService
{
    protected $supportedInclides = [
        'arrivalAirport' => 'arrival',
        'departureAirport' => 'departure',
    ];

    protected $clauseProperties = [
        'status',
        'flightNumber',
    ];

    public function getFlights($parameters)
    {
        if (empty($parameters)) {
            $data = Flight::all();
            return $this->filterFlights($data);
        }

        $withKeys = $this->getWithKeys($parameters);
        $whereClauses = $this->getWhereClause($parameters);

        $flights = Flight::with($withKeys)->where($whereClauses)->get();

        return $this->filterFlights($flights, $withKeys);
    }

    protected function getWithKeys($parameters) {
        $withKeys = [];

        if (isset($parameters['include'])) {
            $includeParams = explode(',', $parameters['include']);
            $includes = array_intersect($this->supportedInclides, $includeParams);
            $withKeys = array_keys($includes);
        }

        return $withKeys;
    }

    protected function getWhereClause($parameters)
    {
        $clause = [];

        foreach ($this->clauseProperties as $prop) {
            if (in_array($prop, array_keys($parameters))) {
                $clause[$prop] = $parameters[$prop];
            }
        }

        return $clause;
    }

    protected function filterFlights($flights, $keys = [])
    {
        $data = [];

        foreach ($flights as $flight) {
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                'href' => route('flights.show', ['id' => $flight->flightNumber]),
            ];

            if (in_array('arrivalAirport', $keys)) {
                $entry['arrival'] = [
                    'datetime' => $flight->arrivalDateTime,
                    'iataCode' => $flight->arrivalAirport->iataCode,
                    'city' => $flight->arrivalAirport->city,
                    'state' => $flight->arrivalAirport->state,
                ];
            }

            if (in_array('departureAirport', $keys)) {
                $entry['departure'] = [
                    'datetime' => $flight->departureDateTime,
                    'iataCode' => $flight->departureAirport->iataCode,
                    'city' => $flight->departureAirport->city,
                    'state' => $flight->departureAirport->state,
                ];
            }

            $data[] = $entry;
        }

        return $data;
    }
}
