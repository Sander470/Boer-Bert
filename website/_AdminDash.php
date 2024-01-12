<body>
    <p id="status"></p>
    <select id="gateButton" onclick="submitData()" method="post" action="gateUpdate.php">
        <option value="open">Open</option>
        <option value="closed" >Closed</option>
    </select>
</body>
<script>
    async function logState() {
        const response = await fetch("configGate.json");
        const state = await response.json(["gateState"]);
        console.log(state);
        document.getElementById("status").innerHTML = state["gateState"];
    };
    logState();
</script>
<?php function submitData()
{
    if (isset($_POST)) {
        $gateStatus = $_POST["gateStatus"];
        // moet nog ff checken hoe json schrijven dus dit klopt niet maar you get the idea
        JSON_write("configGate.json", $gateStatus);
    }
}; ?>