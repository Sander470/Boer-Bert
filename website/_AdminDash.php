<body>
    <p id="status"></p>
    <select id="gateButton" onclick="submitData()" method="post" action="gateUpdate.php">
        <option value="open">Open</option>
        <option value="closed" >Closed</option>
    </select>
</body>
<script>
    logState();
    let gateStatus;
    async function logState() {
        const response = await fetch("configGate.json");
        const jsonData = await response.json(["gateState"]);
        console.log("status gate: " + jsonData["gateState"]);
        document.getElementById("status").innerHTML = jsonData["gateState"];
        gateStatus = jsonData["gateState"];
    };

console.log(gateStatus);
    if (gateStatus["gateState"]) {
document.getElementById(gateButton.value) = open;
    }
    else {
        document.getElementById(gateButton.value) = closed;
    }
</script>
<?php function submitData()
{
    if (isset($_POST)) {
        $gateStatus = $_POST["gateStatus"];
        // moet nog ff checken hoe json schrijven dus dit klopt niet maar you get the idea
        JSON_write("configGate.json", $gateStatus);
    }
}; ?>