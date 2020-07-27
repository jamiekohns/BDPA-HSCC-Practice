<?php

namespace Flights\RestRequest;

use Flights\RestRequest\RestRequest;

class ApiInfo extends RestRequest {

    public function __construct(string $apiKey, string $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    public function airports()
    {
        $response = $this->send('airports');

        return $response;
    }

    public function airlines()
    {
        $response = $this->send('airlines');

        return $response;
    }

    public function noFlyList()
    {
        return $this->send('no-fly-list');
    }
}
