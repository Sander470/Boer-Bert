<?php
if (isset($_POST['data'])) {
    // read file
    $jsonString = file_get_contents('configGate.json');
    // decode
    $data = json_decode($jsonString, true);
    // change value
    $data[0]["gateState"] = "false";
    // replace value
    file_put_contents('configGate.json', json_encode($data));
    echo '$data';
} else {
    echo 'Error: No data received';
}
?>