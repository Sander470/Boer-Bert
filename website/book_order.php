<?php
use processing\Database;
include 'processing/Database.php';

//if (isset($_POST["submit"])) {

    $firstName = $_POST["firstName"];
    $infix = $_POST["infix"];
    $lastName = $_POST["lastName"];
    $mail = $_POST["mail"];
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
    $bookStart = date("Y-m-d",strtotime($bookStart));
    $bookEnd = date("Y-m-d",strtotime($bookEnd));

    $setupHelp = $_POST["setupHelp"];



    $database = new Database('../db.json', false);
    $database->connectDB();

    $insertUser = $database->conn->prepare( 'INSERT INTO `user` (mail, first_name, infix, last_name, birth_date, phone, street, house_number, postal_code, city, country)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);' );
    try {
        $insertUser->bind_param('sssssssisss', $mail, $firstName, $infix, $lastName, $birthDate, $phoneNr, $street, $houseNr, $postalCode, $city, $country);
        $insertUser->execute();
    } catch (Exception $e) {
        echo '<br>' . $e;
    }

    // retrieve id from `user` where mail matches $mail from the form
    $fetchId =  $database->conn->prepare( 'SELECT id FROM user WHERE mail = ?' );
    $fetchId->bind_param('s', $mail);
    try {
        $fetchId->execute();
        $user_id = $fetchId->get_result();
        } catch (Exception $e) {
        echo "<br>" . $e;
    }
    if($user_id->num_rows > 0) {
        while($row = $user_id->fetch_assoc()) {
            try {
                $insertOrder = $database->conn->prepare( 'INSERT INTO `order` (plot_id, user_id, start_date, end_date, num_people, setup_help, accommodation_type) 
                    VALUES (?, ?, ?, ?, ?, ?, ?);' );
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
            try {
                $fieldNr = 3;
                $insertOrder->bind_param('iissiis', $fieldNr, $user_id, $bookStart, $bookEnd, $numOfPeople, $setupHelp, $placeType);
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
            try {
                $insertOrder->execute();
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
        }
    }


//    $database->conn->prepare( 'INSERT INTO `order` (plot_id, start_date, end_date, accommodation_type, num_people, setup_help)
//        VALUES (?, ?, ?, ?, ?, ?)');


    $database->disconnectDB();

//}


function invertDate(string $date): string {
    $dateArray = explode("-", $date);
    $reformattedDate = '';
    if(strlen($dateArray[0]) == 4) {
        for($i = 2; $i > -1; $i--) {
//            echo "<br> dateArray: " . $i . " " . $dateArray[$i] . "<br>";
            $reformattedDate = $reformattedDate . $dateArray[$i];
//            echo "<br> reformattedDate: " . $reformattedDate;
            if($i <3 && $i > 0) {
                $reformattedDate = $reformattedDate . "-";
            }
        }
    }
    return $reformattedDate;
}