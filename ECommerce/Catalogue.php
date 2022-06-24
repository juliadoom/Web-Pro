<?php
require_once 'DataBaseConnection.php';
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: Login.php");
}

$product = $_POST['select'];
$action = $_POST['action'];


switch($action) {
    case "Add":
        $_SESSION['cart'][$product] ++;
        break;
    case "Remove":
        $_SESSION['cart'][$product] --;
        if ($_SESSION['cart'][$product] <= 0) {
            unset($_SESSION['cart'][$product]);
        }
        break;
    case "Empty":
        unset ($_SESSION['cart']);
        break;
    case "Info":
        $_SESSION['product'] = $product;
        break;
}
?>
<html>
    <head>
        <title>Catalogue</title>
        <link href="../bootstrap/ccs/bootstrap.min.css" rel="stylesheet">
        <script src="../boostrap/js/boostrap.min.js" type="text/javascript"></script>
    </head>
    <body class="container text-center" style="width: 75%;">
        <br>
        <h2>Catalogue</h2>
        <br>
        <form method="post" action="Catalogue.php">
            <div class="form-inline">
                <label>Select an item:</label>
                <select class="form-control" name="select" style="width: 50%;">
                    <option value>Select an item</option>
                    <?php
                    $search = "SELECT Name, idProducts FROM CSIS2440.Products order by name";
                    $return = $con->query($search);
                    
                    if (!$return) {
                        $message = "Whole query" . $search;
                        echo $message;
                        die ("Invalid query" . mysqli_error());
                    }
                    
                    while ($row = mysqli_fetch_array($return)) {
                        if ($row['idProducts'] == $product) {
                            echo "<option value='" . $row['idProducts'] . "' selected='selected'>"
                                    . $row['name'] . "</option>";
                        } else {
                            echo "<option value='" . $row['idProducts'] . "'>"
                                    . $row['name'] . "</option>\n";
                        }
                    }
                    ?>
                </select>
            </div>
            
                    <table>
                        <tr>
                            <td>
                                <input type="submit" value="Add" name="action" class="button"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" value="Remove"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" value="Empty"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" value="Info"/>
                            </td>
                        </tr>
                    </table>

                </div>
                <div id="productInformation">

                </div>
                <div>
                    <?php
                    if ($infonum > 0) {
                        $sql = "SELECT `Name`, `Description`, `Price` FROM CSIS2440.Products WHERE idproducts = " . $infonum;
                        echo "<table align = 'left' width = '100%'><tr><th><b><i>NAME</b></i></th><th><b><i>DESCRIPTION</b></i></th><th><b><i>PRICE</b></i></th><th><b><i>IMAGE</b></i></th></tr>";
                        $result = $con->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            list($name, $desc, $price) = mysqli_fetch_row($result);
                            echo"<tr>";
                            echo "<td align=\"left\" width=\"450px\">$name</td><br>";
                            echo "<td align=\"center\">Item Description: $desc</td><br>";
                            echo "<td align=\"right\" width=\"325px\">Item Price: " . money_format('%(#8n', $price) . "</td><br>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
                <div>
                    <?php
                    if ($_SESSION['cart']) {
                        //show the cart
                        echo "<table border=\"1\" padding=\"3\" width=\"640px\"><tr><th>Name</th><th>Desc</th><th>Price</th></tr>";

                        foreach ($_SESSION['cart'] as $product_id => $quantity) {
                            $sql = "SELECT `Name`, `Description`, `Price` FROM CSIS2440.Products WHERE idproducts = " . $product_id;

                            $result = $con->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                list($name, $desc, $price) = mysqli_fetch_row($result);

                                $line_cost = $price * $quantity; 

                                $total = $total + $line_cost;
                                echo "<tr>";
                                //show this information in table cells
                                echo "<td align = \"left\" width = \"75px\">$name</td>";
                                echo "<td align = \"center\" width = \"450px\">$desc</td>";
                                echo "<td align = \"center\" width = \"75px\">" . money_format('%(#8n', $price) . "</td>";
                                echo "</tr>";
                            }
                        }
                        //show the total
                        echo "<tr>";
                        echo "<td align=\"right\">Total</td>";

                        echo "<td align = \"right\">" . money_format('%(#8n', $total) . "</td>";
                        echo "</tr>";
                        echo "</table>";
                    } else {
                        echo "You have no items in your shopping cart.";
                    }
                    mysqli_close($con)
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>
        </form>
</html>