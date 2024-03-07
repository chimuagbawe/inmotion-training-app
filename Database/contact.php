<?php
include('connection.php');

$sql = "CREATE TABLE Reach_Out(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    phone VARCHAR(255),
    category VARCHAR(255),
    report VARCHAR(255) NOT NULL,
    laid_on TIMESTAMP NOT NULL
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>