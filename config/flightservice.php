<?php

return [
    'flight' => [
        'host' => env('FLIGHTHOST', 'aerodatabox.p.rapidapi.com'),
        'key' => env('FLIGHTKEY', '343e7f55cbmshfed5773961c3311p18042bjsn67894b8e111d'),
        'query' => env('FLIGHTQUERY', true),
        'url' => env('FLIGHTURL', "https://aerodatabox.p.rapidapi.com/flights"),
    ],
];
