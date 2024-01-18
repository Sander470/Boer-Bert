<?php
// get file and write current status
$jsonString = file_get_contents('configGate.json');
echo "<p class='gateText'>$jsonString<p>";
?>

<body>
<link rel="stylesheet" href="wwwroot/css/style.css" />
    <link rel="icon" href="wwwroot/img/cowlogo.ico" />>
    <button class="gateButton" onclick="submitOpen()">Open</button>
    <button class="gateButton" onclick="submitClose()">Close</button>
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
        fetch('Gate_open.php')
            .then(response => response.text())
            .then(data => {
                console.log(data)
            });
    }
    function submitClose() {
        fetch('Gate_close.php')
            .then(response => response.text())
            .then(data => {
                console.log(data)
            });
    }
</script>