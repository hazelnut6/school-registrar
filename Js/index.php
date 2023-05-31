<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION["UserLogin"])){
    echo "Welcome ".$_SESSION["UserLogin"];
}else{
    echo "Welcome Guest";
}



include_once("../Connections/Connection.php");
$con = connection();
$sql = "SELECT * FROM student_records ORDER BY id DESC";



$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();
// print_r($row);

// do {
//     echo $row['first_name']."<br/>".$row['surname'];"<br/>";
// } while ($row = $students->fetch_assoc());
?>


<?php if(isset($_SESSION["UserLogin"])){?>
    <a href="logout.php">Logout</a>
<?php } else { ?>
    <a href="login.php">Login</a>
<?php } ?>








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
        .table{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        table, thead, tbody, tr, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        table{
            width: 750px;
        }
        thead{
            background-color: rgb(231, 194, 82);
            font-family: serif;
        }
        tbody{
            background-color: rgb(237, 220, 170);
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1> Patient's Information </h1><br/>

    <!-- Search Bar -->
    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>
    <br>

    <a href="insert.php"> Insert New </a>

   <div class="table">
   <table>
        <thead>
            <tr>
                <th>View</th>
                <th>Id</th>
                <th >First Name</th>
                <th>Last Name</th>
                <!-- <th>Birthday</th> -->
                <!-- <th>Gender</th> -->
                <!-- <th>Enrolled Date</th> -->
            </tr>
        </thead>
        <tbody>  
            <?php do{ ?>
                <tr>
                    <td><a href="details.php?ID=<?php echo $row["id"];?>">view</a></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <!-- <td><?php echo $row['birthday']; ?></td> -->
                    <!-- <td><?php echo $row['gender']; ?></td> -->
                    <!-- <td><?php echo $row['enrolled_date']; ?></td> -->
                </tr>
            <?php }while($row = $students->fetch_assoc()) ?>
        </tbody>
    </table>
   </div>
</body>
</html>