<?php
//UPDATE `CSIS2440`.`Character` SET `charHistory` = 'He was born in a small town, and one day was shooting for some food when up from the ground came a bubbling crude' WHERE (`idCharacter` = '1');

if (!$email) {
    echo "You are missing the email of who we are changing";
} else {

    $update = "UPDATE `CSIS2440`.`Character` SET `charHistory` = '$history'";




    if ($conndb->query($update) === TRUE) {
        echo "Record updated successfully";
        echo "The history for " . $name . " has been updated";
    } else {
        echo "Error updating record: " . $conndb->error;
    }
}