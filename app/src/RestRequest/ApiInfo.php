<?php
namespace Flights\RestRequest;

use Flights\RestRequest\RestRequest;

class ApiInfo extends RestRequest{

  public function __construct(string $apiKey, string $baseurl)
  {
      parent::__construct($apiKey, $baseurl);

  }

  public function airport()
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
    $response = $this->send('no-fly-list');
    return $response;
  }


}
