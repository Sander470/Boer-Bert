<?php
// get file and write current status
$jsonString = file_get_contents('configGate.json');
echo $jsonString;

?>

<body>
    <button onclick="submitOpen()">Open</button>
    <button onclick="submitClose()">Close</button>
</body>
<script>
    logState();
    let gateStatus;
    async function logState() {
        const response = await fetch("configGate.json");
        const jsonData = await response.json(["gateState"]);
        console.log("status gate: " + jsonData["gateState"]);
        gateStatus = jsonData["gateState"];
    };

    // call on PHP function
    function submitOpen() {
        fetch('Gate_script.php')
            .then(response => response.text())
            .then(data => {
                console.log("done!")
            });
    }
</script>