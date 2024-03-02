<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->products;


$recommend= $_SESSION['recommended'];

//Create a PHP array with our search criteria

$findCriteria=[
    "name" => $recommend
];

$tagssearch=$collection->find($findCriteria);

foreach ($tagssearch as $tag) {
    $tag1=$tag["tags"][0];
    $tag2=$tag["tags"][1];
    $tag3=$tag["tags"][2];
    $tags="$tag1|$tag2|$tag3";
    $tags1="/$tag1|$tag2|$tag3/i";
}


// Define the query filter
$filter = [
    '$or' => [
        ['name'  => ['$regex' => $tags]],
        ['specs1' => ['$regex' => $tags1]],
        ['specs2' => ['$regex' => $tags1]],
        ['specs3' => ['$regex' => $tags1]],
    ],
];

// Execute the query and get the result cursor
$cursor = $collection->find($filter);

//Output each customer as a JSON object with comma in between
$jsonStr = '['; //Start of array of customers in JSON

//Work through the customers
foreach ($cursor as $product) {
    $jsonStr .= json_encode($product); //Convert PHP representation of customer into JSON 
    $jsonStr .= ','; //Separator between customers
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//Echo final string
echo $jsonStr;
