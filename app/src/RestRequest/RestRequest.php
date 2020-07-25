<?php

namespace Flights\RestRequest;

class RestRequest {
    private $apiKey;
    private $url;

    public function __construct(string $apiKey, string $url){
        $this->apiKey = $apiKey;
        $this->url = $url;
    }

    public function send(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "key: $this->apiKey",
            "content-type: application/json",
        ]);

        $response = curl_exec($ch);

        return $response;
    }
}
