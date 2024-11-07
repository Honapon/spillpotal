<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
 
$dsn = "mysql:host=localhost;dbname=user_n_password";
$username = "game";
$password = "password";
 
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