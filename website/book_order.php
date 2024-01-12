<?php
use processing\Database;
include 'processing\Database.php';

//if (isset($_POST["submit"])) {
    echo 'welcome<br>';

    $firstName = $_POST["firstName"];
    $infix = $_POST["infix"];
    $lastName = $_POST["lastName"];
    $birthDate = $_POST["birthDate"];

    $fieldNr = $_POST["fieldNr"];
    $placeType = $_POST["placeType"];
    $numOfPeople = $_POST["numOfPeople"];

    $bookStart = $_POST["bookStart"];
    $bookEnd = $_POST["bookEnd"];

    $street = $_POST["street"];
    $houseNr = $_POST["houseNr"];
    $postalCode = $_POST["postalCode"];
    $city = $_POST["city"];
    $country = $_POST["country"];

    $phoneNr = $_POST["phoneNr"];
    $setupHelp = $_POST["setupHelp"];

    var_dump($_POST);

    $database = new Database('../../db.json', true);


//}