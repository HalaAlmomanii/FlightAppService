<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;

abstract class FlightService
{
    protected $method;

    protected $http;

    protected $service_url;

    protected $headers;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    protected function prepareRequest($method, $path)
    {
        $this->method = $method;

        $this->service_url = $this->baseUrl() . $path;

        $this->headers = $this->setHeader();
    }

    protected function process()
    {
        return $this->http::withHeaders($this->headers)->{$this->method}($this->service_url);
    }

}
