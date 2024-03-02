<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the customer details 
$username= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_URL);
$password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_URL);


 //Create a PHP array with our search criteria
 $findCriteria = [ "username" => $username ];

 //Find all of the customers that match  this criteria
 $resultArray = $db->customers->find($findCriteria)->toArray();

if ($username == "" || $password == "" || $password1 == "" || $password!=$password1){
    echo 'Please fill out all the correct information'; 
    return;
}
else if(count($resultArray) != 1){
        echo '<a href="login.php">User does not exist signup now</a>';
        return;
    }
else{
//Criteria for finding document to replace
$replaceCriteria = [
    "username" => $username
];

//Data to replace
$customerData = [ '$set' => [
    "password" => $password]
];

//Replace customer data for this ID
$updateRes = $db->customers->updateOne($replaceCriteria, $customerData); 
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
    echo 'ok';
else
    echo 'Password replacement error.';
}
