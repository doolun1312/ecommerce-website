<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$products = filter_input(INPUT_POST, 'products', FILTER_SANITIZE_URL);

if ($products == "" || $products == null) {
    $cursor = $db->products->find();
    //Output each customer as a JSON object with comma in between
    $jsonStr = '['; //Start of array of customers in JSON

    //Work through the customers
    foreach ($cursor as $product) {
        //var_dump($products);
        if ($product["quantity"] > 0) {
            $jsonStr .= json_encode($product); //Convert PHP representation of customer into JSON 
            $jsonStr .= ','; //Separator between customers
        }
    }

    //Remove last comma
    $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

    //Close array
    $jsonStr .= ']';

    echo $jsonStr;
} else {

    $cursor = $db->products->find();

    //Output each customer as a JSON object with comma in between
    $jsonStr = '['; //Start of array of customers in JSON

    //Work through the customers
    foreach ($cursor as $product) {
        if (strpos(strtolower($product['name']), strtolower($products)) !== false || substr(strtolower($product['name']), 0, strlen(strtolower($products))) == strtolower($products)) {
            $jsonStr .= json_encode($product); //Convert PHP representation of customer into JSON 
            $jsonStr .= ','; //Separator between customers

        }
    }

    if ($jsonStr[-1] == ",") {
        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);
    }


    //Close array
    $jsonStr .= ']';

    echo $jsonStr;
}
