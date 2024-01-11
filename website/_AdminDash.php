<button onclick="openSignal()" id="gateButton" value="Open">Gate1</button>

<?
$jsonString = file_get_contents('configGate.json');
$data = json_decode($jsonString, true);

function openGate()
{
    $data[1]['firstName'] = "Bob the second";
    $newJsonString = json_encode($data);
file_put_contents('configGate.json', $newJsonString);
echo "Gate is opened!";
}

?>
<script>
    fetch("configGate.json")
        .then(response => response.json())
        .then(jsonObject => console.log(jsonObject));

        function openSignal() {
        var result = '<?php openGate(); ?>'
        document.write(result);
}
</script>