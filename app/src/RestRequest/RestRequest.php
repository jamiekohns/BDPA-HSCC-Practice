<?php

namespace Flights\RestRequest;

class RestRequest {
    protected $apiKey;
    protected $baseUrl;

    public function __construct(string $apiKey, string $baseUrl){
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    protected function send(string $endpoint){
        $url = sprintf(
            '%s/%s',
            $this->baseUrl,
            $endpoint
        );
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
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
