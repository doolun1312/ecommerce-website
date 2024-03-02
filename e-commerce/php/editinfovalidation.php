<?php

//Start session management
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection  
$collection = $db->customers;

//Extract the data that was sent to the server 
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_URL);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_URL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_URL);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_URL);
$oldpassword=filter_input(INPUT_POST, 'oldpassword', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_URL);
$password1= filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_URL);
$oldusername= $_SESSION["loggedInUsername"];



//Create a PHP array with our search criteria
$findCriteria= [ "username" => $username];
$findCriteria1= [ "username" => $oldusername];



//Find all of the customers that match  this criteria
$resultArray = $db->customers->find($findCriteria)->toArray();
$resultArray1 = $db->customers->find($findCriteria1)->toArray();

if ($name == "" || $surname == "" || $username == "" || $email == "" || $password == "" || $password1 == "" || $password!=$password1){
    echo 'Please fill out all the correct information'; 
    return;
}

//Check that there is exactly one customer
if(count($resultArray) == 1){
    echo 'Username already exists please choose another one';
    return;
}

//Get customer and check password
$customer = $resultArray1[0];
if($customer['password'] != $oldpassword){
    echo 'Old password incorrect please try again';
    return;
}
    
echo 'ok';

