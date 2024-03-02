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
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_URL); 
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_URL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_URL);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_URL);
$password1= filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_URL);

 //Create a PHP array with our search criteria
 $findCriteria = [ "username" => $username ];

 //Find all of the customers that match  this criteria
 $resultArray = $db->customers->find($findCriteria)->toArray();


// if values are null or if password1 doesn't match password, echo an error message
if ($name == "" || $surname == "" || $username == "" || $email == "" || $password == "" || $password1 == "" || $password!=$password1){
    echo 'Please fill out all the correct information';
    return;
}
// else if the username is found in the database echo en error message
else if(count($resultArray) == 1){
        echo 'Username already taken please choose another one';
        return;
    }
// else echo ok
else{
    echo 'ok';}