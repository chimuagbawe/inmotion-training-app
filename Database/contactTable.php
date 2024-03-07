<?php
include('connection.php');

$sql = "CREATE TABLE contacted(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    report_subject VARCHAR(255)
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>