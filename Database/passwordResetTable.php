<?php
include('connection.php');

$sql = "CREATE TABLE pswdReset(
    id INTEGER PRIMARY KEY,
    resetEmail TEXT NOT NULL,
    resetSelector TEXT NOT NULL,
    resetToken LONGTEXT NOT NULL,
    resetExpires TEXT NOT NULL
)";



if(mysqli_query($con, $sql)){
    echo "created successfully";
} else{
    echo "failed";
}

mysqli_close($con);

?>