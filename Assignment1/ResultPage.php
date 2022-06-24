<!DOCTYPE html>
<?php
$info = $_POST;
$gend = $_POST["gender"];
$name = $_POST["HeroName"];
$kingdom = $_POST["KingdomName"];
$race = $_POST["Race"];
$class = $_POST["Class"];
$age = $_POST["Age"];

//open and rading files
$file = file_get_contents('RaceInfo.txt');
$raceTxt = explode('}', $file);
$file = file_get_contents('ClassInfo.txt');
$classTxt = explode('}', $file);
    //array informatiton assignments
$charRace = array("Human" => $raceTxt[0], "Elf" => $raceTxt[1], "Dwarf" => $raceTxt[2], "Halfling" => $raceTxt[3]);
$charCls = array("Fighter" => $classTxt[0], "Cleric" => $classTxt[1], "Thief" => $classTxt[2], "Magic-User" => $classTxt[3]);

//imagefilename
function imgGen($gend, $race, $class){
    if($gend == ""){
        $gend = "Male";
    }

    $img = substr($race ,0, 2).substr($class, 0, 2).substr($gend, 0, 2).".jpg";
    return $img;
}

//random stats from 2 tp 16
function statGen(){
    $stat = array("Str" => rand(2, 16), "Con" => rand(2, 16), "Dex" => rand(2, 16),
                    "Wis" => rand(2, 16), "Int" => rand(2, 16), "Cha" => rand(2, 16));
    return $stat;
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>A made Adventurer</title>
        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->

        <link href="../../../css/freelancer.min.css" rel="stylesheet" type="text/css"/>
        <style>
            img {
                height: 250px;
                padding: 3pt;
            }
            p{
                margin-left: 8px;
            }
        </style>
    </head>

    <body>
        <div id="CharacterSheet" class="container">
            <div class="row">
                <h3 class="Content">The Brave Adventurer</h3>
            </div>
            <div class="row">
                 <div class="col-md-3">
                    <?php
                    //randomizing stats
                    $stats = statGen();
                    foreach($stats as $stat => $val){
                        print("$stat : $val <br>");
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <?php
             print('<header class="text-center">');
                       print("<h4>$name from $kingdom</h4>");
                       print("<b>$race $class</b> at the age $age");
                       print('</header>');
                       print($charRace[$race]);
                       print('</br>');
                       print($charCls[$class]);
                    ?>
                </div>
                <div class="col-md-4">
                    <img src="" alt="">
                    <?php
                    //print image here
                     print("<img src=images/".imgGen($gend, $race, $class)." alt =' ' >");
                    ?>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="../../../vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- Plugin JavaScript -->
        <script src="../../../vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

        <!-- Contact Form JavaScript -->
        <script src="../../../js/jqBootstrapValidation.min.js" type="text/javascript"></script>
        <script src="../../../js/contact_me.min.js" type="text/javascript"></script>

        <!-- Custom scripts for this template -->
        <script src="../../../js/freelancer.min.js" type="text/javascript"></script>
    </body>
</html>
