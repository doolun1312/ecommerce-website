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

$username= $_SESSION["loggedInUsername"];



//Create a PHP array with our search criteria
$findCriteria= [ "username" => $username];



//Find all of the customers that match  this criteria
$resultArray = $db->customers->find($findCriteria)->toArray();


//Get customer information
$customer = $resultArray[0];
echo 'Name: '.$customer['name'].'<br>';
echo 'Surname: '.$customer['surname'].'<br>';
echo 'Username: '.$customer['username'].'<br>';
echo 'Email: '.$customer['email'].'<br><br><br>';
    
