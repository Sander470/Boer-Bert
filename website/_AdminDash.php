<body>
    <p id="status"></p>
    <select id="gateButton" onclick="submitData()" method="post" action="gateUpdate.php">
        <option value="open">Open</option>
        <option value="closed" selected>Closed</option>
    </select>
</body>
<script>
    fetch("configGate.json")
        .then(response => response.json())
        .then(jsonObject => console.log(jsonObject));

    function submitData() {
        if (isset($_POST)) {
            $gateStatus = $_POST["gateStatus"];
            // moet nog ff checken hoe json schrijven dus dit klopt niet maar you get the idea
            JSON_write("configGate.json", $gateState);
        }
    };

    document.getElementById("status").innerHTML = gateButton.value;
</script>