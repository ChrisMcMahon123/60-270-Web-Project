<?php 
$serverName = 'localhost';
$databaseName = 'test';
$username = 'root';
$password = '';

// create connection using PDO 
try {
    $databaseConnection = new PDO('mysql:host='.$serverName.';dbname='.$databaseName, $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connected successfully';
}
catch(PDOException $error) {
    echo 'Connection failed: '.$error->getMessage();
}
?>
