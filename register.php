<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
   
    $username = $_POST["username"];
    $password = $_POST["password"];

    $connect = dbConnect();
    $stmt = $connect->prepare("SELECT * FROM userogpass WHERE username = ?");
    $stmt->execute([$username]);
    
    if ($stmt->fetch()) {
        echo '<div class="error">Username already taken</div>';
        exit;
    }

    $stmt = $connect->prepare("INSERT INTO userogpass (username, passord_hash) VALUES (?, ?)");
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
        <h1>Create an account</h1>
        <form method="post">
            <input name="username" type="text" placeholder="create a username">
            <input name="password" type="password" placeholder=" create a password">
            <a href="index.php">Already have a user?</a>
        </form>
        <button>
            Register
        </button>
    </div>
</body>
</html>