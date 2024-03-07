<?php
include('connection.php');

$sql = "CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pasword VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    last_activity TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP
)";

if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);

?>