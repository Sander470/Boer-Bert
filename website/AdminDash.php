<?php
// get file and write current status
$jsonString = file_get_contents('configGate.json');
echo "<p class='gateText'>$jsonString<p>";
?>

<body>
    <link rel="stylesheet" href="wwwroot/css/style.css" />
    <link rel="icon" href="wwwroot/img/cowlogo.ico" />
    <form action="changeGateState.php" method="post" class="gateText">
        <input type="radio" name="gateState" value="true">open</button>
        <input type="radio" name="gateState" value="false">close</button>
        <br>
        <button type=submit class="gateButton" >submit</button>
    </form>
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
</script>