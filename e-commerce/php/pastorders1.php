<?php
session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;


//Extract the data that was sent to the server
$function = filter_input(INPUT_GET, 'function', FILTER_SANITIZE_URL);
$orderid= filter_input(INPUT_GET, 'orderid', FILTER_SANITIZE_URL);
$client= filter_input(INPUT_GET, 'user', FILTER_SANITIZE_URL);

$user = $_SESSION["loggedInUsername"];
//Create a PHP array with our search criteria
$findCriteria = [
    "client" => $user,
];

$collection = $db->orders;


$cursor = $db->orders->find($findCriteria)->toArray();


if (count($cursor) == 0) {
    echo "<div style='font-size:20px; text-align:center; padding: 100px'>No previous orders</div>";
} else {
    //Work through the customers
    foreach ($cursor as $order) {
     
        //Convert JSON to array of product objects
        echo "<div class='package package_free'>";
        echo "<h2>Date ordered: " . $order["date"] . "</h2>";
        echo " <div class='price'><div class='big'>" . $order["total"] . "</div></div>";
        echo "<ul>";
        foreach ($order["items"] as $item) {
            $findCriteria2 = [
                "name" => $item["name"]
            ];
            $cursor2 = $db->products->find($findCriteria2);
            foreach ($cursor2 as $product) {
                echo "<li><img id='pic' src='" . $product["picturescr"] . "'>" . $product["name"] . " <br>";
                $prodtotal = (intval(substr($product["price"], 0))) * (intval($item["quantity"]));

                if ($product["promo"] == true) {
                    echo "Price:<span style='color:red'><strike>£" . $product["pricebefore"] . " </strike></span>£" . $product["price"] . "<br>Quantity: " . $item["quantity"] . "<br>Total: £" . $prodtotal . "</li> ";
                } else {
                    echo "Price: £" . $product["price"] . "<br>Quantity: " . $item["quantity"] . "<br>Total: £" . $prodtotal . "</li>";
                }
            }
        }

        echo "</ul>";
        echo "<button> <a href='pastorders1.php?function=add&orderid=".$order["orderID"]."&user=".$order["client"]."'>Re-Order</a></button>";
        echo "</div>";
    }
    // add an order function
    if ($function == "add") {
        $Criteria = [
            "client" => $client,
            "orderID" => $orderid
        ];
        
        // generate an random number for the orderID
        $orderi=(random_int(100,999));

        $search = $db->orders->find($Criteria)->toArray();

        // get current date and time
        $date= date('m/d/Y h:i:s a', time());

        // data array to add to the orders collection in the database
        $dataArray = [
            "client" => $client,
            "orderID" => "".$orderi."",
            "date" => $date,
            "total" => $search[0]["total"],
            "items" => $search[0]["items"],
        ];

        $insertResult = $db->orders->insertOne($dataArray);
        //Echo result back to user
        if ($insertResult->getInsertedCount() == 1) {
            // echo"added";
            echo '<script> window.location="pastorders.php?state=added";</script>';

        } else {
            echo 'Error adding order';
        }
    }
 
    }


