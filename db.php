<?php

$server = "localhost";
$username = "anti";
$password = "anti798511";
$db_name = "hunt";


try {
    $conn = new PDO("mysql:host=$server;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>
