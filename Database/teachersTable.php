<?php
include('connection.php');

$sql = "CREATE TABLE teachers(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    phone INTEGER NOT NULL,
    experience VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    programming_language VARCHAR(255) NOT NULL,
    spoken_language VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>