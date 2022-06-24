<?php

if (!$name) {
    echo "You are missing the name of the item you are searching for.";
} else {

    $search = "select * from `CSIS2440`.`Character` where `charName` like '%" . $name . "%'";
    //$message = "Whole query ".$search;
    //echo $message;
    $return = $conndb->query($search);
    //print_r($return);

    echo "<table><tr><th>Name</th><th>History</th><th colspan='6'>Stats</th></tr>";
    while ($row = $return->fetch_assoc()) {

        echo "<tr><td> " . $row['charName'] . "</td>";
        echo "<td> " . $row['charHistory'] . "</td>";
        echo "<td> Str: " . $row['Str'] . "</td>";
        echo "<td> Con: " . $row['Con'] . "</td>";
        echo "<td> Dex: " . $row['Dex'] . "</td>";
        echo "<td> Int: " . $row['Int'] . "</td>";
        echo "<td> Wis: " . $row['Wis'] . "</td>";
        echo "<td>Cha: " . $row['Cha'] . "</td></tr>";
    }
    echo "</table>";
    //echo "Did a search";
}