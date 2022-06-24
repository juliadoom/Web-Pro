
<?php
require "DBconn.php";
print_r($_POST);
$action = $_POST['Action'];
$email = $_POST['playEmail'];
$email = mysql_fix_string($conndb, $email);
$name = $_POST['CharName'];
$name = mysql_fix_string($conndb, $name); //&nbsp &lt &gt
$name = strtolower($name);
$name = ucwords($name);
$race = $_POST['Race'];
$class = $_POST['Class'];
$gender = $_POST['Gender'];
$history = mysql_fix_string($conndb, $_POST['History']);

$stats = ["Str", "Con", "Dex", "Wis", "Int", "Cha"];
$CharStats = array();
for ($s = 0; $s < 6; $s++) {
    $CharStats[$stats[$s]] = rand(3, 18);
}
print_r($CharStats);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Character Results</title>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <style>

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="FormValFF.js"></script>
        <script language="Javascript">

        </script>
    </head>
    <body>
        <?php
        // add new character, search a character, or update a current character
        switch ($action) {
            case "Update":
                //echo "Updating"; //This is updating the record
                include 'Update.php';
                break;
            case "Search":
                //echo "Searching";//This is looking for a record
                include 'Search.php';
                break;
            case "Create":
                //echo "Creating";//this is creating a new record
                include 'Create.php';
                break;
            default:
                echo "Broken";
                break;
        }
        ?>
    </body>
</html>
