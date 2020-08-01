<?php
require 'vendor/autoload.php';

use \Flights\RestRequest\RestRequest;

$apiKey = 'atlfb92a-5a76-4422-9997-4568b163b0fb';
$url = 'https://airports.api.hscc.bdpa.org/v1/info/no-fly-list';

$restRequest = new RestRequest($apiKey, $url);

$response = $restRequest->send();



var_dump($response);
