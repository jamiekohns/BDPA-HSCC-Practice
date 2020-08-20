<?php

namespace Flights\RestRequest;


class ApiFlights extends RestRequest
{
    public function __construct()
    {

        parent::__construct('flights');
    }


  public function all(string $afterAll = NULL)
  {

    if($afterAll !== NULL){
      $response = $this->send('?' . 'after=' . $afterAll);
      return $response;
    }else{
      $response = $this->send('');
      return $response;
    }
    }

  public function search(string $afterSearch = NULL, array $match = NULL, array $regexMatch = NULL, string $sort = NULL)
  {
      // var_dump($_REQUEST);
      $endUrl = '?';
      if($afterSearch !== NULL){

        $endUrl .= 'after=' . $afterSearch;
      }elseif($match !== NULL){
        $finalMatch = urlencode(json_encode($match));
        $endUrl .= '&match=' . $finalMatch;
      }elseif($regexMatch !== NULL){
        $finalRegexMatch = urlencode(json_encode($regexMatch));
        $endUrl .=  '&regexMatch=' . $finalRegexMatch;
      }if($sort !== NULL){
        if($sort == 'asc' | $sort == 'desc'){
         $endUrl.= '&sort=' . $sort;
       }else{
         throw new \Exception("Please enter valid sort, Ascending(asc) or Descending(desc)", 1);

       }
      }
      //die($endUrl);
      $response = $this->send($endUrl);
      return $response;
  }

  public function with_ids(array $ids = NULL)
  {
    $endUrl = 'with-ids?';
      if($ids !== NULL)
      {
        $finalIds = urlencode(json_encode($ids));
        $endUrl .= 'ids=' . $finalIds;
      }
      $response = $this->send($endUrl);
      return $response;
  }

}
