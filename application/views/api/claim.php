<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.claiming.com.au/demo/claim?auth_group=1&allow_duplicate=true",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"BulkBill\",\r\n  \"flags\": {\r\n    \"serviceType\": \"O\"\r\n  },\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"1974-02-28\",\r\n    \"medicare\": {\r\n      \"number\": \"2952631861\",\r\n      \"ref\": 1\r\n    },\r\n    \"gender\": \"M\",\r\n    \"name\": {\r\n      \"first\": \"Bernhardt\",\r\n      \"family\": \"Griffith\"\r\n    }\r\n  },\r\n  \"provider\": {\r\n    \"servicing\": \"2433411Y\"\r\n  },\r\n  \"items\": [\r\n    {\r\n      \"chargeAmount\": \"50.50\",\r\n      \"date\": \"2018-10-15\",\r\n      \"itemNumber\": \"00104\"\r\n    },\r\n    {\r\n      \"chargeAmount\": \"50.50\",\r\n      \"date\": \"2018-10-15\",\r\n      \"itemNumber\": \"00105\"\r\n    },\r\n    {\r\n      \"chargeAmount\": \"50.50\",\r\n      \"date\": \"2018-10-15\",\r\n      \"itemNumber\": \"00106\"\r\n    },\r\n    {\r\n      \"chargeAmount\": \"50.50\",\r\n      \"date\": \"2018-10-15\",\r\n      \"itemNumber\": \"00107\"\r\n    }\r\n  ]\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;