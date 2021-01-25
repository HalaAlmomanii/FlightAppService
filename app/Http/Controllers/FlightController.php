<?php

namespace App\Http\Controllers;

use App\Repositories\FlightServiceInterface;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    public function index(Request $request)
    {
        return view('layout.app');
    }

    public function show($flight_number, FlightServiceInterface $flight)
    {
       return $flight->find($flight_number);

    }

}
