<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION["Access"]) && $_SESSION["Access"] == "administrator"){
    echo "Welcome ".$_SESSION["UserLogin"]. "</br></br>";
}else{
    echo header("Location: index.php");
}



include_once("../Connections/Connection.php");
$con = connection();
$id = $_GET["ID"];


// $sql = "SELECT * FROM student_records ORDER BY id DESC";
$sql = "SELECT * FROM student_records WHERE ID = '$id'";

$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();
?>


<!-- <?php if(isset($_SESSION["UserLogin"])){?>
    <a href="logout.php">Logout</a>
<?php } else { ?>
    <a href="login.php">Login</a>
<?php } ?> -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/details.css">
    <title>Document</title>
</head>
<body>
   <div class="output">
   <form action="delete.php" method="post">
    <a href="index.php">Back</a>&nbsp;
    <a href ="edit.php?ID=<?php echo $row['id'];?>">Edit</a><br>
   <button type="submit" name="delete">Delete</button>

   <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
</form>
   <br>
   <h2><?php echo $row["first_name"];?> <?php echo $row["surname"];?></h2>
    <p>Is a <?php echo $row["gender"];?>,</p>
    <p>Admitted on: <?php echo $row["birthday"];?>,</p>
    <p>Return Schedule: <?php echo $row["enrolled_date"];?></p>
   </div>
</body>
</html>