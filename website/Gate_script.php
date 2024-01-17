<?php

  if (isset($_POST['data'])) {
    $jsonString = file_get_contents('jsonFile.json');
$data = json_decode($jsonString, true);
    $data[0]["gateState"] = "true";
    $newJsonString = json_encode($data);
    file_put_contents('configGate.json', $newJsonString);
    echo '$newJsonString';
  } else {
    echo 'Error: No data received';
  }
?>