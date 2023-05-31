<?php
include_once("../Connections/Connection.php");
$con = connection();

// echo $_POST['ID'];

if(isset($_POST['ID'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM student_records WHERE ID = '$id'";
    $con->query($sql) or die($con->error);
    echo header ("Location: index.php");

}
?>