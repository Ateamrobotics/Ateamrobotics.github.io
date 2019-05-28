<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://70.27.41.188:27017");
$collection = $client->attendance->admin_users;

$result = $collection->insertOne( [ 'username' => 'Allan', 'firstName' => 'Allan', 'lastName' => 'Parks', 'password' => '6544aburg' ] );

echo "Inserted with Object ID '{$result->getInsertedId()}'";
?>