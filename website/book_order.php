<?php
use processing\Database;
include 'processing/Database.php';

//if (isset($_POST["submit"])) {
    echo 'welcome';

    $firstName = $_POST["firstName"];
    $infix = $_POST["infix"];
    $lastName = $_POST["lastName"];
    $birthDate = $_POST["birthDate"];

    $street = $_POST["street"];
    $houseNr = $_POST["houseNr"];
    $postalCode = $_POST["postalCode"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $phoneNr = $_POST["phoneNr"];

    $fieldNr = $_POST["fieldNr"];
    $placeType = $_POST["placeType"];
    $numOfPeople = $_POST["numOfPeople"];

    $bookStart = $_POST["bookStart"];
    $bookEnd = $_POST["bookEnd"];

    $setupHelp = $_POST["setupHelp"];



    $database = new Database('../db.json', true);
    $database->connectDB();

    $database->conn->prepare( 'INSERT INTO `user` (mail, first_name, infix, last_name, birth_date, phone, street, house_number, postal_code, city, country) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);' );

    // retrieve id from `user` where mail matches $mail from the form
    $matchId =  $database->conn->prepare( 'SELECT id FROM user WHERE mail = ?');
    $matchId = $matchId->bind_param('s', $mail);
    $result = $database->conn->query($matchId);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
        }
    }


    $database->conn->prepare( 'INSERT INTO `order` (plot_id, start_date, end_date, accommodation_type, num_people, setup_help)
        VALUES (?, ?, ?, ?, ?, ?)');

    $database->disconnectDB();

//}