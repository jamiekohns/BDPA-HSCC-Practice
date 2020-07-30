<?php
require 'vendor/autoload.php';

use \Flights\RestRequest\ApiInfo;

$apiKey = 'atlfb92a-5a76-4422-9997-4568b163b0fb';
$url = 'https://airports.api.hscc.bdpa.org/v1/info';

$request = new ApiInfo($apiKey, $url);

echo($request->airports());
