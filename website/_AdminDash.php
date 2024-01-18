<?php
// get file and write current status
$jsonString = file_get_contents('configGate.json');
echo "<p class='gateText'>$jsonString<p>";
?>

<body>
    <link rel="stylesheet" href="wwwroot/css/style.css" />
    <link rel="icon" href="wwwroot/img/cowlogo.ico" />
    <form action="changeGateState.php" method="post">
        <input type="radio" name="gateState" value="open">open</button>
        <input type="radio" name="gateState" value="close">close</button>
        <button type=submit>submit</button>
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