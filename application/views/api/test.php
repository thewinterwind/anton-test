<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.claiming.com.au/dev/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:Medicare\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"1974-02-28\",\r\n    \"medicare\": {\r\n      \"number\": \"2952631861\",\r\n      \"ref\": 1\r\n    },\r\n    \"gender\": \"M\",\r\n    \"name\": {\r\n      \"first\": \"Bernhardt\",\r\n      \"family\": \"Griffith\"\r\n    }\r\n  }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer T7Vr1QqBIm8HaFI2QaIdPZ_3Y6IS5BjU"
  ),
));

$response = curl_exec($curl);

// $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
echo $response;