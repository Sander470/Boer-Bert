<?php
use processing\Database;
include 'processing/Database.php';

//if (isset($_POST["submit"])) {
    echo '<h1>WORKING!</h1>';

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
    $fetchId =  $database->conn->prepare( 'SELECT id FROM user WHERE mail = ?' );
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
                $insertOrder = $database->conn->prepare( 'INSERT INTO `order` (plot_id, user_id, start_date, end_date, num_people, setup_help, accommodation_type) 
                    VALUES (?, ?, ?, ?, ?, ?, ?);' );
                echo ' prepared..<br>';
            } catch (Exception $e) {
                echo '<br>' . $e;
            }
            try {
                $fieldNr = 3;
                echo 'assigned vars.. binding..';
                echo '<br>bookEnd: ' . $bookEnd . "<br> bookStart: " . $bookStart;
                $insertOrder->bind_param('iissiis', $fieldNr, $user_id, $bookStart, $bookEnd, $numOfPeople, $setupHelp, $placeType);
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