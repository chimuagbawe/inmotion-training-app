<?php
include('connection.php');

$sql = "CREATE TABLE events(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    teacher_id VARCHAR(255),
    title VARCHAR(255),
    time VARCHAR(255),
    date VARCHAR(255),
    email VARCHAR(255),
    location VARCHAR(255),
    phone VARCHAR(255),
    eventDescription VARCHAR(255),
    image VARCHAR(255),
    type TIMESTAMP NOT NULL,
    created_at VARCHAR(255) NOT NULL
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);