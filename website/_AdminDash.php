<button click="submitData" id="gateButton">Gate1</button>
<script>
  const jsonString=[{"name":"Hank","id":"1"},
  {"name":"andrew","id":"2"},{"name":"john","id":"3"},
  {"name":"Flintoff","id":"4"},{"name":"Greg","id":"5"},
  {"name":"Francis","id":"6"}];

  console.log(JSON.stringify(jsonString,null,3));
        fetch("configLED.json")
            .then(response => response.json())
            .then(jsonObject => console.log(jsonObject));
</script>