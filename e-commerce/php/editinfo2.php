<?php

session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection  
$collection = $db->customers;
$collection1 = $db->orders;


//Extract the data that was sent to the server 
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_URL);
$surname = filter_input(INPUT_GET, 'surname', FILTER_SANITIZE_URL);
$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_URL);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_URL);
$profilepicture = filter_input(INPUT_GET, 'profile_picture', FILTER_SANITIZE_URL);
$oldusername = $_SESSION["loggedInUsername"];

// Criteria for finding document to replace
$replaceCriteria = [
    "username" => "$oldusername"
];

$replaceCriteria1 = [
    "client" => "$oldusername"
];

//Data to replace
$customerData = [
    '$set' =>
    [
        "name" => $name,
        "surname" => $surname,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "profilepicture" => $profilepicture
    ]
];

$customerData1 = [
    '$set' =>
    [
        "client" => $username
    ]
];


//Replace customer data for this ID
$Result = $collection->updateOne($replaceCriteria, $customerData);
$Result1 = $collection1->updateMany($replaceCriteria1, $customerData1);

//Echo result back to user
if ($Result->getModifiedCount() == 1) {
    //Remove all session variables
    session_unset();

    //Destroy the session 
    session_destroy();
    echo 'ok';
} else{
    echo 'Customer replacement error.';}
