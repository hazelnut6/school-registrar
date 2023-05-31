<?php
function connection(){
    // echo "This is a function";

    $host = "localhost";
    $username = "root";
    $password = "whatever907";
    $database = "school_database";
    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error){
        echo $con->connect_error;
    } else {
        return $con;
    }

    
}
?>