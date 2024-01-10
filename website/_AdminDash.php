<button onclick="submitData()" id="gateButton" value="Open">Gate1</button>
<script>
    var user = {
        map: {
            width: 785,
            height: 791
        },
        image: {
            name: "image.png",
            size: {
                width: 32
            }
        },
        properties: [{
                firstName: "Bob",
                lastName: "Jones",
            },
            {
                firstName: "Janet",
                lastName: "Jones",
            }
        ]
    };
    fetch("configLED.json")
    .then(response => response.json())
    .then(jsonObject => console.log(jsonObject));
    console.log(JSON.stringify(user))
    var open = document.getElementById("gateButton.value")

    function submitData() {
        user.properties[1].firstName = "Bob the second";
        console.log(JSON.stringify(user))
    }
</script>