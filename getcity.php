<?php

$postcode = $_REQUEST["postcode"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.overheid.io/bag?ovio-api-key=53c30c30aefc6347e7b9e795435a084f7d26f14d279bfc3ec5ed7a0291e89553&filters[postcode]=".$postcode."&size=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: api.overheid.io",
    "Postman-Token: c1a6d513-11ac-47aa-bedf-bb2e97acc82d,fa7974c0-cae0-46db-a6d1-4527df76ffc2",
    "User-Agent: PostmanRuntime/7.15.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}