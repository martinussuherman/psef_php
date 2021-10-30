<?php
function initCurl(string $apiUrl, string $token)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2TLS,
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token,
    ),
  ));

  return $curl;
}

function execCurl($curl)
{
  if ($curl === false) {
    return false;
  }

  $response = curl_exec($curl);
  $errorMsg = curl_error($curl);
  curl_close($curl);

  if ($errorMsg != "") {
    return $errorMsg;
  }

  return json_decode($response, false);
}

function callGetApi(string $apiUrl, string $token)
{
  $curl = initCurl($apiUrl, $token);
  return execCurl($curl);
}

function callPostApi(string $apiUrl, string $token, $postData)
{
  $curl = initCurl($apiUrl, $token);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  return execCurl($curl);
}
