 <?php
if (isset($_POST)) {
    $gateState = $_POST["gateState"];
    // read file
    $jsonString = file_get_contents('configGate.json');
    // decode
    $data = json_decode($jsonString, true);
    // change value
    $data["gateState"] = $gateState;
    // replace value
    file_put_contents('configGate.json', json_encode($data));
    var_dump($data);
} else {
    echo 'Error: No data received';
}