<?php
session_start();
unset($_SESSION['badPass']);
require_once 'DataBaseConnection.php';
$date = date("format", $timestamp);
$_SESSION['LoginDate'] = $date;

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_fix_string($con,$myusername);
$mypassword = mysql_fix_string($con,$mypassword);
$Hashed = hash("ripemd128", $mypassword);

$sql = "SELECT * FROM CSIS2440.Users WHERE username ='" .$myusername."' and password ='".$Hashed."'";
echo $sql;
$result = $con->query($sql);

if(!$result) {
    $message = "Whole query ". $sql;
    echo $message;
    die('Invalid query ' . mysqli_error());
}

$count = $result->num_rows;

if ($count == i) {
    header("Location: Catalogue.php");
    $_SESSION['user'] = $myusername;
    $_SESSION['password'] = $mypassword;
} else {
    header["Location: Login.php"];
    $_SESSION['badPass']++;
} 
mysqli_close($con);
?>

