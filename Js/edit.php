<?php

include_once("../Connections/Connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_records WHERE ID = '$id'";

$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST["submit"])){
//   echo "Submitted";
  $fname= $_POST["first_name"];
  $lname = $_POST["surname"];
  $gender = $_POST["gender"];

  $sql = "UPDATE student_records SET first_name = '$fname', surname = '$lname', gender = '$gender' WHERE ID = '$id'";
  
  $con->query($sql) or die ($con->error);

  echo header("Location: details.php?ID=".$id);
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
    <input type="text" name="first_name" id="firstname" value="<?php echo $row['first_name'];?>"><br>

    <label>Last name </label><br>
    <input type="text" name="surname" id="search" value="<?php echo $row['surname'];?>"><br>
    <br>

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
        <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
    </select><br>
    <br>

    <input type="submit" name="submit" value="Update">
   </form>
   </div>

</body>
</html>