<?php
session_start();
include("../Database/connection.php");

$_SESSION['nameError'] = $_SESSION['emailError'] = $_SESSION['passwordError'] = $_SESSION["success"] = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

if(empty(trim($_SESSION["name"]))){
    $_SESSION['nameError'] = "Please enter Your name";
}else if (!preg_match("/^[a-zA-Z ]*$/", $_SESSION['name'])) {
    $_SESSION['nameError'] = "Name must only be letters and white spaces.";
}

if (empty(trim($_SESSION["email"]))) {
    $_SESSION['emailError'] = "Please enter your email.";
} elseif(!filter_var( $_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailError'] = "Invalid email format.";
}

if(empty($_SESSION['password'])){
    $_SESSION['passwordError'] = 'Create a Unique Password';
}elseif(!preg_match('/^(?=.*[A-Z])(?=.*[@$!%*?&]).{6,}$/', $_SESSION['password'])) {
    $_SESSION['passwordError'] = "Password of at least 6 must contain one uppercase letter and one special character.";
}

if(empty($_SESSION["nameError"]) && empty($_SESSION['emailError']) && empty($_SESSION["passwordError"])) {
$name = trim(htmlspecialchars($_SESSION['name']));
$email = trim(htmlspecialchars($_SESSION['email']));
$password = trim(htmlspecialchars(password_hash($_SESSION['password'], PASSWORD_DEFAULT)));

$king = "SELECT email FROM users WHERE email = '$email'";
$result = mysqli_query($con, $king);

if ($result && mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = "Error Message";
    $_SESSION['action'] = " Login Instead";
    $_SESSION['emailError'] = "Email already exists";
    $_SESSION['nameError'] = "";
$_SESSION['passwordError']  = "";
$_SESSION['success'] = "";
    header("Location:" .  $_SERVER['HTTP_REFERER']);    
} else{
    $sql = "INSERT INTO users (id, full_name, email, pasword, created_at) VALUES (NULL, '$name', '$email', '$password', NULL)";
if (mysqli_query($con, $sql)) {
    $_SESSION['message'] = 'Success!!!';
    $_SESSION['action'] = " Login";
    $_SESSION["nameError"] = "Created account successfully";
    $_SESSION['passwordError']  = "";
    $_SESSION['emailError']  = "";
    $_SESSION['success'] = "";
    header("Location:" .  $_SERVER['HTTP_REFERER']);  
}}
}else{
    $_SESSION['message'] = 'Error Message';
    $_SESSION['action'] = " Take Me Back";
    // $_SESSION['nameError'] = "";
    // $_SESSION['emailError'] = "";
    // $_SESSION['passwordError']  = "";
    $_SESSION['success'] = "";
    header("Location:" .  $_SERVER['HTTP_REFERER']);  
}
}
?>