<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.claiming.com.au/{{version}}/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n\t\"client_id\": \"{{K6KNRWORSAUY45WK23U2}}\",\r\n\t\"client_secret\": \"{{ysd4xKK9MxFmtbAwxQomow3kiqHdlujmgcUFJUI3P9hgUpBKwcP6fp5uy7Dj}}\",\r\n\t\"grant_type\": \"client_credentials\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;