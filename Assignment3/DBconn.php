<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$host = 'localhost';
$user = 'root';
$pass = 'DBAdmin';
$dbname = 'CSIS2440';

$conndb = new mysqli($host, $user, $pass, $dbname)
        or die('Could not connect to the database server' . mysqli_connect_error());

//echo "You connected<br>";
function mysql_fix_string($conn, $string) {

    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    $string = htmlentities($string);
    return $conn->real_escape_string($string);
}
