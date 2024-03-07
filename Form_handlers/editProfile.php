<?php 
session_start();
include("../Database/connection.php");

$dbImage = "";
$directory = "../Images/assets/";
$fileExtension = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
$filename = uniqid('teacherImage',true) . $fileExtension;
$target_file = $directory . basename($filename);

if(isset($_POST['submit'])){
$id = $_SESSION['loginId'];
$name = $_POST["name"];
$image = $_FILES['image'];
$department = $_POST["department"];
$experience = $_POST["experience"];
$spoken_language = $_POST["spoken_language"];

$king = "SELECT * FROM teachers WHERE user_id = '$id'";
$result = mysqli_query($con, $king);

if ($result && mysqli_num_rows( $result) > 0) {

$sql = "UPDATE `users` SET `full_name` = '$name' WHERE `users`.`id` = $id";
// echo "Error updating name: " . mysqli_error($con);
//     die();
if(mysqli_query($con, $sql)){
if (!empty($_FILES["image"]["name"])) {
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    
        $dbImage = "images/assets/".$filename;
        }else{
        header("Location: ../become-a-teacher.php");
        }
} else {
    $dbImage = $_SESSION["image"];
}
    $sql1 = "UPDATE `teachers` SET `experience` = '$experience', `department` = '$department', `spoken_language` = '$spoken_language', `image` = '$dbImage' WHERE `teachers`.`user_id` = $id";    
if(mysqli_query($con, $sql1)){
    $_SESSION["name"] = $name;
    $_SESSION["image"] = $dbImage;
    $_SESSION["experience"] = $experience;
    $_SESSION["department"] = $department;
    $_SESSION["spoken_language"] = $spoken_language;
    $_SESSION['message'] = "Success!!";
    $_SESSION['action'] = "";
    $_SESSION['emailError'] = "Your Profile has been successfully updated.";
    $_SESSION['nameError'] = "";
    $_SESSION['passwordError']  = "";
    $_SESSION['success'] = "";
    header("Location:" .  $_SERVER['HTTP_REFERER']);  

    header("Location: ../teacher-profile.php");
    exit;
}else{
    header("Location: ../index.php");
}
}else{
    echo "Error updating name: " . mysqli_error($con);
    die();
}
}else{
    header("Location: ../about.php");
}}
?>