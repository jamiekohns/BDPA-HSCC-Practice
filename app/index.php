<?php

require 'vendor/autoload.php';

use Flights\RestRequest\RestRequest;
use Flights\Api\Test;

$rest = new RestRequest();
echo $rest->getName();

$test = new Test();
