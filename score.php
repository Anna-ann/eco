<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://private-anon-ff14ca0230-ecotech.apiary-proxy.com/?method=getRequestItem&token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJncm91cHNfaWQiOjIyfQ.h_7-CwxionZC5c3dbZNV42DPIBcd99xok5vDMuOPmKA
");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"jsonrpc\": \"2.0\",
  \"method\": \"getRequestItem\",
  \"params\": {
    \"code\": \"A2C4E6\"
  }
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
