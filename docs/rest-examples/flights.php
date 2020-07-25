<?php
$apiKey = 'atlfb92a-5a76-4422-9997-4568b163b0fb';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://airports.api.hscc.bdpa.org/v1/flights/all?");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "key: $apiKey",
    "content-type: application/json",
]);

$response = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

var_dump($info["http_code"]);
var_dump($response);
