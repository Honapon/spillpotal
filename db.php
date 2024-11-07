<?php
 
$dsn = "mysql:host=localhost;dbname=phpOppgave";
$username = "game";
$password = "passwordforgame";
 
try {
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("connected to this (yipi)");
    return $connect;
} catch (PDOException $e) {
    echo 'Connection no work :( </br>' . $e->getMessage();
    exit;
}
 
?>