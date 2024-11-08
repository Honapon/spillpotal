<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    echo("test0");
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo("test1");
    $connect = dbConnect();
    echo("test2");

    $stmt = $connect->prepare("SELECT * FROM userogpass WHERE username = ?");
    echo("test3");
    $stmt->execute([$username]);
    echo("test4");
    if ($stmt->fetch()) {
        $error = '<div class="error">Username already taken</div>';
        exit;
    }
    echo("test5");
    $stmt = $connect->prepare("INSERT INTO userogpass (username, passord_hash) VALUES (?, ?)");
    echo("test6");
    $stmt->execute([$username, $password]);
    echo  '<div class="success">User created</div>';

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="skjema">
        <h1>Logg inn</h1>
        <form method="post">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Password">
            <a href="register.php">Register</a>
            <button>
                Logg inn
            </button>
            
        </form>

    </div>
</body>

</html>