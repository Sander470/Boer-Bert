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

$mail = 'dummymail';

    $database = new Database('../db.json', true);
    $database->connectDB();

    $insertUser = $database->conn->prepare( 'INSERT INTO `user` (mail, first_name, infix, last_name, birth_date, phone, street, house_number, postal_code, city, country) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);' );
    try {
        $insertUser->bind_param('sssssssisss', $mail, $firstName, $infix, $lastName, $birthDate, $phoneNr, $street, $houseNr, $postalCode, $city, $country);
        $insertUser->execute();
        echo '<br>inserted data.';
    } catch (Exception $e) {
        echo '<br>' . $e;
    }

    // retrieve id from `user` where mail matches $mail from the form
    $fetchId =  $database->conn->prepare( 'SELECT id FROM user WHERE mail = ?');
    echo '<br>prepared mailsearch';
    $fetchId->bind_param('s', $mail);
    echo '<br>bound param for mailsearch';
    try {
        $fetchId->execute();
        $user_id = $fetchId->get_result();
        echo '<br>executed mailsearch';
        } catch (Exception $e) {
        echo "<br>" . $e;
    }
    if($user_id->num_rows > 0) {
        while($row = $user_id->fetch_assoc()) {
            echo '<br>id ' . $row["id"];
            try {
                $insertOrder = $database->conn->prepare( 'INSERT INTO `order` (plot_id, user_id, start_date, end_date, num_people, date, setup_help, accommodation_type) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?);' );
                echo ' prepared..';
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
            try {
                $bookStart = '2000-01-01';
                $bookEnd = '2000-01-10';
                $dateThing = '2000-01-01 00:00';
                $setupHelp = 1;
                $fieldNr = 3;
                $insertOrder->bind_param('iississs', $fieldNr, $user_id, $bookStart, $bookEnd, $numOfPeople, $dateThing, $setupHelp, $placeType);
                echo ' bound params..';
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
            try {
                $insertOrder->execute();
                echo ' inserted order..';
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
        }
    }


//    $database->conn->prepare( 'INSERT INTO `order` (plot_id, start_date, end_date, accommodation_type, num_people, setup_help)
//        VALUES (?, ?, ?, ?, ?, ?)');


    $database->disconnectDB();

//}