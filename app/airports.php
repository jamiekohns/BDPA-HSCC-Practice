<?php
require 'vendor/autoload.php';

use \Flights\RestRequest\ApiFlights;

$apiKey = 'atlfb92a-5a76-4422-9997-4568b163b0fb';
$baseUrl = 'https://airports.api.hscc.bdpa.org/v1/flights';

$afterAll = '5f0b87e09c4d62d7b65bb38c';

$afterSearch = '5f0b87e09c4d62d7b65bb38c';

$match = new stdClass();
$match->comingFrom = "SMN";

$regexMatch = new stdClass();
$regexMatch->status = 'landed|arrived|boarding';

$sort = 'asc';

$ids = ["5f0b87e09c4d62d7b65bb3c8", "5f0b87e09c4d62d7b65bb3e6"];

$request = new ApiFlights($apiKey, $baseUrl);
echo($request->with_ids($ids));
