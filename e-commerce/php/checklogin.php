<?php
//Start session management
session_start();

//Connect to MongoDB and select database


require __DIR__ . '/vendor/autoload.php'; //Include libraries
$mongoClient = (new MongoDB\Client); //Create instance of MongoDB client
$db = $mongoClient->ecommerce;

if (array_key_exists("loggedInUsername", $_SESSION)) {
    $username = $_SESSION['loggedInUsername'];
    //Create a PHP array with our search criteria
    $findCriteria = ["username" => $username];
    //Find all of the customers that match  this criteria
    $resultArray = $db->customers->find($findCriteria)->toArray();


    //Get customer and send profile picture link
    $customer = $resultArray[0];
    $profilepic = $customer['profilepicture'];
    echo $profilepic;
} else {
    echo 'Not logged in.';
}
