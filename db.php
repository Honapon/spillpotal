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

function dbConnect()
{
    try {
        $connect = new PDO($dsn, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo ("connected to this (yipi)");

        //user data
        $user_name = 'user_name';
        $user_password = 'user_password';
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

        //insert user data
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':username', $user_name);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "New Record created successfully";
        } else {
            echo "error: Could not execute the query";
        }

        return $connect;
    } catch (PDOException $e) {
        echo 'Connection no work :( </br>' . $e->getMessage();
        exit;
    }
}