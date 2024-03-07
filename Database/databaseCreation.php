<?php
include('connection.php');

$sql = "CREATE DATABASE Inmotion";

if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>