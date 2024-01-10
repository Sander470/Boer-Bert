<button onclick="submitData()" id="gateButton" value="Open">Gate1</button>
<script>
    var user = {
    map: {
        width: 785,
        height: 791
    },
    image: {
        name: "image.png",
        size: {width:32}
    },
    properties:[{
        firstName: "Bob",
        lastName: "Jones",
    },
{
    firstName: "Janet",
    lastName: "Jones",
}]
};
console.log(user)
    var open = document.getElementById("gateButton.value")

    function submitData() {
        user.properties[1].firstName = "Jane";
        console.log(user)
    }
    
</script>