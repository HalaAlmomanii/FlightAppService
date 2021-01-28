<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

Route::prefix('flights')->group(function () {
    Route::GET('/{flight}', [FlightController::class, 'show']);
});
