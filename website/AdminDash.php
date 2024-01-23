<?php
// get file and write current status
$jsonString = file_get_contents('configGate.json');
echo "<p class='gateText'>$jsonString<p>";
?>

<body>
    <link rel="stylesheet" href="wwwroot/css/style.css" />
    <link rel="icon" href="wwwroot/img/cowlogo.ico" />
    <form id="GateID" onsubmit="return sendData()" class="gateText">
        <input type="radio" name="gateState" value="true">open</button>
        <input type="radio" name="gateState" value="false">close</button>
        <br>
        <button type=submit class="gateButton">submit</button>
    </form>
</body>
<script>
    let gateStatus;

    function sendData () {
  // (A) GET FORM DATA
  var data = new FormData(document.getElementById("GateID"));
  // data.append("KEY", "VALUE");
 
  // (B) INIT FETCH POST
  fetch("changeGateState.php", {
    method: "POST",
    body: data
  })
  .then(alert ("Done! Gate is now changed"))
  .then(location.reload())
 
  // (C) RETURN SERVER RESPONSE AS TEXT
  .then(res => {
    if (res.status != 200) { throw new Error("Bad Server Response"); }
    return res.text();
  })
 
  // (D) SERVER RESPONSE
  .then(res => console.log(res))
 
  // (E) HANDLE ERRORS - OPTIONAL
  .catch(err => console.error(err));
 
  // (F) PREVENT FORM SUBMIT
  return false;
}
</script>