<?php

$update = "UPDATE `CSIS2440`.`Planets` SET `Active` = 'Y' ";
if ($desc != "A short description of the planet") {
    $update .= ", `Desc` = '$desc' ";
}
$update .= "WHERE (`PlanetName` = '" . $name . "')";
$success = $con->query($update);
if ($success == FALSE) {
    $failmess = "Whole query " . $update . "<br>";
    echo $failmess;
    die('Invalid query: ' . mysqli_error($con));
} else {
    echo $name . " was given a space station<br>";
}
