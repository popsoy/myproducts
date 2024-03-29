<?php

$databaseHost = 'localhost';
$databaseName = 'mycrud';
$databaseUsername = 'root';
$databasePassword = '';

try {
	// http://php.net/manual/en/pdo.connections.php
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
	
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	// More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $er) {
	echo $er->getMessage();
}
 
?>
