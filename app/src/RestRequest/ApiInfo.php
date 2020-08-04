<?php

namespace Flights\RestRequest;

class ApiInfo extends RestRequest {

    public function __construct()
    {
        $baseUrl = $_ENV['API_BASE_URL'] . '/info';
        parent::__construct($baseUrl);
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
