<?php

namespace App\Http\Controllers;

use App\Repositories\FlightServiceInterface;
use Carbon\Carbon;

class FlightController extends Controller
{

    public function show($flight_number, FlightServiceInterface $flight)
    {
        $response = $flight->find($flight_number);

        if ($response->getStatusCode() === 200) {
            return response()->json([
                'data' => $this->format($response->json())
            ]);
        }

        return response()->json([
            'error' => $response->json()
        ], $response->getStatusCode());

    }


    public function format($items)
    {
        $result = [];

        foreach ($items as $item) {
            $result[] = [
                'from' => $item['departure']['airport']['municipalityName'],
                'to' => $item['arrival']['airport']['municipalityName'],
                'status' => $item['status'],
                'airline' => $item['airline']['name'],
                'departure_airport' => $item['departure']['airport']['name'],
                'departure_time' => Carbon::make($item['departure']['scheduledTimeUtc'])->toDayDateTimeString(),
                'arrival_airport' => $item['arrival']['airport']['name'],
                'arrival_time' => Carbon::make($item['arrival']['scheduledTimeUtc'])->toDayDateTimeString(),
            ];
        }
        return $result;
    }
}
