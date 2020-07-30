<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Flights\RestRequest\ApiInfo;

$rest = new ApiInfo();
echo $rest->airports();
