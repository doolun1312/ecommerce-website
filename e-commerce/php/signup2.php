<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->customers;

//Extract the data that was sent to the server 
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_URL);
$surname = filter_input(INPUT_GET, 'surname', FILTER_SANITIZE_URL);
$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_URL);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_URL);
$password1= filter_input(INPUT_GET, 'password1', FILTER_SANITIZE_URL);
$profilepicture = filter_input(INPUT_GET, 'profile_picture', FILTER_SANITIZE_URL);

 
//Convert to PHP array
$dataArray = [
    "name" => $name,
    "surname" => $surname,
    "username" => $username,
    "email" => $email,
    "password" => $password,
    "profilepicture" => $profilepicture
];

//Add the new customer to the database
$insertResult = $collection->insertOne($dataArray);

//Echo result back to user
if ($insertResult->getInsertedCount() == 1) {
    echo 'Customer added';
} else {
    echo 'Error adding customer';
}

