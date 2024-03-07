<?php
session_start();
include("../Database/connection.php");

$teacherId = $_SESSION["loginId"];
$sql = "DELETE FROM teachers WHERE user_id = $teacherId";
$_SESSION['role'] = "student";
if (mysqli_query($con, $sql)) {
    header('Location: ../index.php');
}

?>