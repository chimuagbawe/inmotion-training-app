<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$database = "inmotionhub";

$con = mysqli_connect($hostName, $userName, $password, $database);
if($con){
    // echo "connection has been successfully established";
}else{
    echo "Big problem though, connection has not been established";
}
?>