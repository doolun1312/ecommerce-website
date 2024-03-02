<?php
    //Start session management
    session_start();

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_URL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_URL);    

if ($username == "" || $password == ""){
    echo "Please enter your credentials";
    return;
}

    //Connect to MongoDB and select database
	require __DIR__ . '/vendor/autoload.php';//Include libraries
	$mongoClient = (new MongoDB\Client);//Create instance of MongoDB client
	$db = $mongoClient->ecommerce;
	
    //Create a PHP array with our search criteria
    $findCriteria = [ "username" => $username ];

    //Find all of the customers that match  this criteria
    $resultArray = $db->customers->find($findCriteria)->toArray();

    //Check that there is exactly one customer
    if(count($resultArray) == 0){
        echo 'Username not found';
        return;
    }
   
    //Get customer and check password
    $customer = $resultArray[0];
    if($customer['password'] != $password){
        echo 'Password incorrect';
        return;
    }
        
    //Start session for this user
    $_SESSION['loggedInUsername'] = $username;
    
    //Inform web page that login is successful
    echo 'ok';  
   
	
    