<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.claiming.com.au/dev/claim?auth_group=AUTH_GROUP_ID",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"type\": \"Medicare\",\n    \"flags\": {\n        \"accountPaid\": \"N\",\n        \"serviceType\": \"O\"\n    },\n    \"items\": [\n        {\n            \"chargeAmount\": \"40.95\",\n            \"date\": \"2018-10-15\",\n            \"itemNumber\": \"00023\"\n        }\n    ],\n    \"location\": {\n        \"name\": \"St Elsewhere's Hospital\",\n        \"type\": \"H\"\n    },\n    \"patient\": {\n        \"dateOfBirth\": \"1962-06-23\",\n        \"gender\": \"F\",\n        \"medicare\": {\n            \"number\": \"2950552261\",\n            \"ref\": \"2\"\n        },\n        \"name\": {\n            \"family\": \"BAILEY\",\n            \"first\": \"CANDY\"\n        }\n    },\n    \"provider\": {\n        \"servicing\": \"2408271B\"\n    }\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer o-CQEMmav8KGrERPmwti9Y5UcO9t4ZGf"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;