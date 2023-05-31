<?php


if(!isset($_SESSION)){
    session_start();
}


include_once("../Connections/Connection.php");
$con = connection();

if(isset($_POST["login"])){
    // echo"Login";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user_accounts WHERE username = '$username' AND password = '$password'";

    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;


    if($total > 0){
        $_SESSION["UserLogin"] = $row["username"];
        $_SESSION["Access"] = $row["access"];

        // echo $_SESSION["UserLogin"];
        echo header("Location: index.php");
    }else{
        echo "No user found";
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Css/Style.css"> -->
    <title>Document</title>
    <style>
        *{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Log In Page</h1><br/>
    <br>
    <form action ="" method="post">
        <label>Username</label><br>
        <input type ="text" name ="username" id="username"><br>
        <label>Password</label><br>
        <input type ="password" name ="password" id="password"><br>
        <br>
        <button type ="submit" name="login">Log in</button>
    </form>
</body>
</html>