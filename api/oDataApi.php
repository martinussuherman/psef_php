<?php
session_start();
require_once("apiCall.php");

global $settingData;
$passedEntity = $entity;
$postData = $_POST;
$apiUrl = "{$settingData->apiServerUrl}/api/v0.1/{$entity}";
echo dataTableToODataProxy($postData, $apiUrl, $_SESSION["accessToken"]);
