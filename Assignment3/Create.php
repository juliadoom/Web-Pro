<?php

if (!$name || !$email || !$history) {
    echo "You are missing some information, please return and enter all feilds by hitting the back button.";
} else {
    //INSERT INTO `CSIS2440`.`Character` (`charEmail`, `charName`, `charGender`, `charRace`, `charClass`, `charHistory`, `Str`, `Dex`, `Con`, `Int`, `Wis`, `Cha`) 
    //VALUES ('emai', 'em', 'm', 'mm', 'mm', 'mm', '1', '1', '1', '1', '1', '1');

    $insert = "INSERT INTO `CSIS2440`.`Character` (`charEmail`, `charName`, `charGender`, `charRace`, `charClass`, `charHistory`, `Str`, `Dex`, `Con`, `Int`, `Wis`, `Cha`)  "
            . "VALUES ('$email', '$name', '$gender', '$race', '$class', '$history', '".$CharStats['Str']."', '".$CharStats['Dex']."', '".$CharStats['Con']."', '".$CharStats['Int']."', '".$CharStats['Wis']."', '".$CharStats['Cha']."')";
    //echo $insert;
    if ($conndb->query($insert) === TRUE) {
            $search = "select * from `CSIS2440`.`Character` where `charEmail` = '" . $email . "'";
        //$message = "Whole query ".$search;
        //echo $message;
        $return = $conndb->query($search);
        //print_r($return);

        echo "<table><tr><th>Name</th><th>History</th><th colspan='6'>Stats</th></tr>";
        while ($row = $return->fetch_assoc()) {
            
            echo "<tr><td> " . $row['charName'] . "</td>";
            echo "<td> " . $row['charHistory'] . "</td>";
            echo "<td> Str: ".$row['Str']."</td>";
            echo "<td> Con: ".$row['Con']."</td>";
            echo "<td> Dex: ".$row['Dex']."</td>";
            echo "<td> Int: ".$row['Int']."</td>";
            echo "<td> Wis: ".$row['Wis']."</td>";
            echo "<td>Cha: ".$row['Cha']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Error updating record: " . $conndb->error;
    }
}
