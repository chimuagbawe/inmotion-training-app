<?php
session_start();
include("../Database/connection.php");

if (isset($_POST['submit'])) {
    $courseId = $_POST['course_id'];
    $deleteQuery = "DELETE FROM courses WHERE `courses`.`id` = $courseId";

    // Debugging: Uncomment the following line to see the generated SQL query
    // var_dump($deleteQuery);

    if (mysqli_query($con, $deleteQuery)) {
        $_SESSION['message'] = "SUCCESS!!!";
        $_SESSION['emailError'] = "Successfully deleted the course";
        $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error!!!";
        $_SESSION['emailError'] = "There was an error deleting the course: " . mysqli_error($con);
        $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
?>