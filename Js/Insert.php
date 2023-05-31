<?php

include_once("../Connections/Connection.php");
$con = connection();

if(isset($_POST["submit"])){
//   echo "Submitted";
  $fname= $_POST["first_name"];
  $lname = $_POST["surname"];
  $gender = $_POST["gender"];

  $sql = "INSERT INTO `student_records`(`first_name`, `surname`, `gender`) VALUES ('$fname','$lname','$gender')";
  $con->query($sql) or die ($con->error);

  echo header("Location: index.php");
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/insert.css">
    <title>Document</title>
</head>
<body>
   <div class="insert-form">
   <form action="" method="post">
    <label>First name </label><br>
    <input type="text" name="first_name" id="firstname"><br>

    <label>Last name </label><br>
    <input type="text" name="surname" id="search"><br>
    <br>

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br>
    <br>

    <input type="submit" name="submit" value="Submit Form">
   </form>
   </div>

</body>
</html>