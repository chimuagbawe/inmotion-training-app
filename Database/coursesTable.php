<?php
include('connection.php');

$sql = "CREATE TABLE courses(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    teacher_id INTEGER,
    title VARCHAR(255) NOT NULL,
    duration VARCHAR(255) NOT NULL,
    teachersName VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    courseDescription TEXT NOT NULL,
    image TEXT NOT NULL,
    student_count INTEGER(10) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE ON UPDATE CASCADE
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>