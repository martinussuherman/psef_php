<?php
function readConfig()
{
  $fileContent = file_get_contents("appsettings.json");
  return json_decode($fileContent, false);
}
