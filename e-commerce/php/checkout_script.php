<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db-> customerinfo;

$address = filter_input(INPUT_POST, 'checkout_address', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'checkout_city', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'checkout_zipcode', FILTER_SANITIZE_STRING);
$country = filter_input(INPUT_POST, 'checkout_country', FILTER_SANITIZE_STRING);
$phone_no = filter_input(INPUT_POST, 'checkout_phonenumber', FILTER_SANITIZE_STRING);

$data = [
    "Address" => $address,
    "City" => $city,
    "Zip" => $zip,
    "Country" => $country,
    "Phone_no" => $phone_no
];

$insertData = $collection-> insertOne($data);

echo '<script>alert("Order Successfully saved")
window.location.replace("index.php")</script>';
