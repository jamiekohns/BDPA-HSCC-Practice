<?php

namespace Flights\RestRequest;

/** the ApiInfo is used to communicate to the metadata endpoints
*this is the child class of RestRequest*/

class ApiInfo extends RestRequest {

    public function __construct()
    {
        $baseUrl = 'info';
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
