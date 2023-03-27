<!-- Create multidimensional array of the following table -->
<?php
$data = array(
    "Q1" => array(
        "Kolkata" => array(
            array(
                "Milk" => 340,
                "Egg" => 604,
                "Bread" => 43
            )
        ),
        "Delhi" => array(
            array(
                "Milk" => 335,
                "Egg" => 365,
                "Bread" => 35
            )
        ),
        "Mumbai" => array(
            array(
                "Milk" => 336,
                "Egg" => 484,
                "Bread" => 80
            )
        )
    ),
    "Q2" => array(
        "Kolkata" => array(
            array(
                "Milk" => 680,
                "Egg" => 583,
                "Bread" => 10
            )
        ),
        "Delhi" => array(
            array(
                "Milk" => 684,
                "Egg" => 490,
                "Bread" => 48
            )
        ),
        "Mumbai" => array(
            array(
                "Milk" => 595,
                "Egg" => 594,
                "Bread" => 39
            )
        )
    ),
    "Q3" => array(
        "Kolkata" => array(
            array(
                "Milk" => 535,
                "Egg" => 490,
                "Bread" => 50
            )
        ),
        "Delhi" => array(
            array(
                "Milk" => 389,
                "Egg" => 385,
                "Bread" => 15
            )
        ),
        "Mumbai" => array(
            array(
                "Milk" => 366,
                "Egg" => 385,
                "Bread" => 20
            )
        )
    )
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Display table in the given format -->
    <h1>Display table in the given format</h1>
    <table>
        <tr>
            <th rowspan="3">Time</th>
            <th colspan="3">Location = "Kolkata"</th>
            <th colspan="3">Location = "Delhi"</th>
            <th colspan="3">Location = "Mumbai"</th>
        </tr>
        <tr>
            <th colspan="3">item</th>
            <th colspan="3">item</th>
            <th colspan="3">item</th>
        </tr>
        <tr>
            <th>Milk</th>
            <th>Egg</th>
            <th>Bread</th>
            <th>Milk</th>
            <th>Egg</th>
            <th>Bread</th>
            <th>Milk</th>
            <th>Egg</th>
            <th>Bread</th>
        </tr>
        <?php
        foreach ($data as $quarter => $city) {
            print_r("<tr><td>$quarter</td>");
            foreach ($city as $cityname => $parameter) {
                foreach ($parameter as $parametername => $product){
                    // print_r($product["Milk"]);
                    print_r("<td>$product[Milk]</td>
                    <td>$product[Egg]</td>
                    <td>$product[Bread]</td>");
                }
            }
            print_r("</tr>");
        }
        ?>
    </table>
        
        <!-- Identify the quarter with maximum sale of egg -->
        <h1>Identify the quarter with maximum sale of egg</h1>
        <?php
        $intervals = array(
            "Q1" => 0,
            "Q2" => 0,
            "Q3" => 0
        );
        foreach ($data as $quarter => $city){
            foreach ($city as $cityname => $parameter) {
                foreach ($parameter as $parametername => $product){
                    $intervals[$quarter] += $product["Egg"];
                }
            }
        }
        $duration = array_keys($intervals,min($intervals));
        print_r("The Quarter which sell the Egg maximum is <b>".$duration[0]."</b> and the amount of Eggs are <b>".max($intervals)."</b>");
        ?>

        <!-- Identify the location with minimum consumption of milk -->
        <h1>Identify the location with minimum consumption of milk</h1>
        <?php
        $location = array(
            "Kolkata" => 0,
            "Delhi" => 0,
            "Mumbai" => 0
        );
        foreach ($data as $quarter => $city){
            foreach ($city as $cityname => $parameter) {
                foreach ($parameter as $parametername => $product){
                    $location[$cityname] += $product["Milk"];
                }
            }
        }
        $place = array_keys($location,min($location));
        print_r("The Location which sell the Milk minimum is <b>".$place[0]."</b> and the amount of Milk is <b>".min($location)."</b>");
        ?>

        <!-- Delete location with minimum sale of bread -->
        <h1>Delete location with minimum sale of bread</h1>
        <?php
        $location = array(
            "Kolkata" => 0,
            "Delhi" => 0,
            "Mumbai" => 0
        );
        foreach ($data as $quarter => $city){
            foreach ($city as $cityname => $parameter) {
                foreach ($parameter as $parametername => $product){
                    $location[$cityname] += $product["Bread"];
                }
            }
        }
        $place = array_keys($location,min($location));
        print_r("The Location which sell the Bread minimum is <b>".$place[0]."</b> and the amount of Breads are <b>".min($location)."</b>");

        foreach ($data as $quarter => $city){
            foreach ($city as $cityname => $parameter) {
                if ($cityname == $place[0]){
                    unset($data[$quarter][$cityname]);
                }
            }
        }
        ?>

    <h2>After Deletion</h2>
    <table>
        <tr>
            <th rowspan="3">Time</th>
            <th colspan="3">Location = "Kolkata"</th>
            <th colspan="3">Location = "Mumbai"</th>
        </tr>
        <tr>
            <th colspan="3">item</th>
            <th colspan="3">item</th>
        </tr>
        <tr>
            <th>Milk</th>
            <th>Egg</th>
            <th>Bread</th>
            <th>Milk</th>
            <th>Egg</th>
            <th>Bread</th>
        </tr>
        <?php
        foreach ($data as $quarter => $city) {
            print_r("<tr><td>$quarter</td>");
            foreach ($city as $cityname => $parameter) {
                foreach ($parameter as $parametername => $product){
                    // print_r($product["Milk"]);
                    print_r("<td>$product[Milk]</td>
                    <td>$product[Egg]</td>
                    <td>$product[Bread]</td>");
                }
            }
            print_r("</tr>");
        }
        ?>
    </table>

</body>

</html>