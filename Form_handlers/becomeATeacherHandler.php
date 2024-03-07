<?php
session_start();
include("../Database/connection.php");

$_SESSION['phoneError'] = $_SESSION['imageError'] = $_SESSION['experienceError'] = $_SESSION['departmentError'] = $_SESSION['pLanguageError'] = $_SESSION['sLanguageError'] = '';

$dbImage = "";
$directory = "../Images/assets/teachers/";
$fileExtension = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
$filename = uniqid('teacherImage',true) . $fileExtension;
$target_file = $directory . basename($filename);

if(isset($_POST['submit'])){
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['image'] = $_FILES['image'];
    $_SESSION['experience'] = $_POST['experience'];
    $_SESSION['department'] = $_POST['department'];
    $_SESSION['pLanguage'] = $_POST['pLanguage'];
    $_SESSION['sLanguage'] = $_POST['sLanguage'];


    if (empty(trim($_SESSION["phone"]))) {
        $_SESSION['phoneError'] = "Please enter Your phone number";
    } else if (!preg_match('/^[0-9]+$/', $_SESSION['phone'])) {
        $_SESSION['phoneError'] = "Phone number must only contain numbers.";
    }
    
    if(empty($_SESSION["image"])) {
        $_SESSION['imageError'] = "image-field must only contain numbers and dashes.";
    }
    
    if(empty(trim($_SESSION["experience"]))) {
        $_SESSION['experienceError'] = "Your years of experience is required.";
    } 
    
    if (empty(trim($_SESSION["department"]))) {
        $_SESSION['departmentError'] = "Please enter your department.";
    } 
    
    if(empty(trim($_SESSION["pLanguage"]))) {
        $_SESSION['pLanguageError'] = "Please enter your best programming language.";
    } 
    
    if(empty(trim($_SESSION["sLanguage"]))) {
        $_SESSION['sLanguageError'] = "Please enter the language you will be most proficient in communication.";
    } 


    if(empty($_SESSION["phoneError"]) && empty($_SESSION["experienceError"])  && empty($_SESSION["departmentError"])  && empty($_SESSION["pLanguageError"])  && empty($_SESSION["sLanguageError"])) {

            if(empty($_SESSION['imageError'])){
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $dbImage = "images/assets/teachers/".$filename;
            }else{
            header("Location: ../become-a-teacher.php");
            }
        }

$id = $_SESSION["loginId"];
$phone = trim(htmlspecialchars($_SESSION['phone']));
$experience = trim(htmlspecialchars($_SESSION['experience']));
$department = trim(htmlspecialchars($_SESSION['department']));
$pLanguage = trim(htmlspecialchars($_SESSION['pLanguage']));
$sLanguage = trim(htmlspecialchars($_SESSION['sLanguage']));

$sql = "INSERT INTO teachers (id, user_id, phone, experience, department, programming_language, spoken_language, image) VALUES (NULL, '$id', '$phone', '$experience', '$department', '$pLanguage', '$sLanguage', '$dbImage')";
if (mysqli_query($con, $sql)) {
    // You Are Now A Teacher At In-motion ICT Hub        
    $sqlThree = "SELECT * FROM teachers WHERE user_id = '$id'";
    $result = mysqli_query($con, $sqlThree);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["phone"] = $row["phone"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["experience"] = $row["experience"];
    $_SESSION["department"] = $row["department"];
    $_SESSION["programming_language"] = $row["programming_language"];
    $_SESSION["spoken_language"] = $row["spoken_language"];
    $_SESSION["image"] = $row["Image"];    
    $_SESSION['role'] = $_SESSION["programming_language"] . " " . "Instructor";   
    header("Location: ../teacher-profile.php"); 
}else{
    $_SESSION['role'] = "student";
}      
}else{
$_SESSION['message'] = 'Error Message: ' . mysqli_error($con);
$_SESSION['action'] = "";
$_SESSION['nameError'] = "";
$_SESSION['emailError'] = "";
$_SESSION['passwordError']  = "";
$_SESSION['success'] = "";
header("Location:" .  $_SERVER['HTTP_REFERER']);}
}else{
$_SESSION['message'] = 'Error Message: ' . mysqli_error($con);
$_SESSION['action'] = "";
$_SESSION['nameError'] = $_SESSION['phoneError'];
$_SESSION['emailError'] = $_SESSION['departmentError'];
$_SESSION['passwordError']  = $_SESSION['experienceError'];
$_SESSION['success'] = "";
header("Location:" .  $_SERVER['HTTP_REFERER']);
}

}
?>