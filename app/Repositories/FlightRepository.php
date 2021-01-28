<?php


namespace App\Repositories;


class FlightRepository extends FlightService implements FlightServiceInterface
{
    public function setHeader()
    {
        return [
            'X-RapidAPI-Key' => config('flightservice.flight.key'),
            'X-RapidAPI-Host' => config('flightservice.flight.host'),
            'useQueryString' => config('flightservice.flight.query')
        ];
    }

    public function baseUrl()
    {
        return config('flightservice.flight.url');
    }

    public function find($flight_number)
    {
        $path = '/number/' . $flight_number;

        $this->prepareRequest('GET', $path);

        return $this->process();
    }
}
