<?php

require 'init.php';
use Flights\RestRequest\ApiInfo;

$rest = new ApiInfo();
echo $rest->airports();

?>
