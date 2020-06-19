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
  CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:Medicare\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"2019-01-12\",\r\n    \"medicare\": {\r\n      \"number\": \"NKM05753\",\r\n      \"ref\": 1\r\n    },\r\n    \"gender\": \"M\",\r\n    \"name\": {\r\n      \"first\": \"WILLIAM\",\r\n      \"family\": \"CHAPMAN\"\r\n    }\r\n  }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer Ha6o0l5DoStIJ07N94G3vhUBFPCxOcQH"
  ),
));

$response = curl_exec($curl);

// $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

echo $response;

// $tmp = explode(',',$response,7);
// $tmp2 = substr($tmp[0], 17);
// print_r($tmp);