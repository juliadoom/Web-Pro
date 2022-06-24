<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hello World</title>
        
        <?php
        $name="Julia D.";
        $age = 27;
        $female = true;
        $icecream= "strawberry";
        $imagefile="img/julia.jpg";
        ?>
    </head>
    <body>
        <div>
            
        <?php
        
        echo "<p style = 'font:tahoma; color:red;'>Hello world, this is my first PHP page! </p>";
        print("My name is: ".$name. " Who is $age years old, and likes $icecream ice-cream</p>");
        print('<p>We are using variables $name, $age, $icecream</p>');
        print("\n<img src='$imagefile' height='300'>\n");
        
        ?>
        </div>
    </body>
</html>
