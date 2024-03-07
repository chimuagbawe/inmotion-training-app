<?php
session_start();
include("../Database/connection.php");

// $_SESSION['nameError'] = $_SESSION['emailError'] = $_SESSION['passwordError'] =  $_SESSION["success"] = '';

if(isset($_POST['submit'])){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $email = trim(htmlspecialchars($_SESSION['email']));
    $password = trim(htmlspecialchars($_SESSION['password']));
    $sqlOne = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sqlOne);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $verifiedPassword = password_verify($password, $row["pasword"]);

        if ($verifiedPassword) {
            $_SESSION["loginId"] = $row["id"];
            $_SESSION["name"] = $row["full_name"];
            $_SESSION["email"] = $row["email"];
            $timestamp = strtotime($row["created_at"]);
            $formattedDate = date("F j, Y", $timestamp);
            $_SESSION["registrationTime"] =  $formattedDate;
            $currentDate = date('F j, Y g:i a');
            $sqlTwo = 'UPDATE `users` SET `last_activity` = "' . $currentDate . '"';
            if(mysqli_query($con, $sqlTwo)){
            $_SESSION["last_activity"] =  $currentDate;
            }else{
                $_SESSION["last_activity"] = "";
            }   
            $id = $_SESSION["loginId"]; 
            
            $sqlThree = "SELECT * FROM teachers WHERE user_id = '$id'";
            $result = mysqli_query($con, $sqlThree);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["id"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["experience"] = $row["experience"];
                $_SESSION["department"] = $row["department"];
                $_SESSION["programming_language"] = $row["programming_language"];
                $_SESSION["spoken_language"] = $row["spoken_language"];
                $_SESSION["image"] = $row["Image"];

                $_SESSION['role'] = $_SESSION["programming_language"] . " " . "Instructor";


            }else{
                $_SESSION['role'] = "student";
            }
            $_SESSION['message'] = 'Success!!!';
            $_SESSION['action'] = "";
            $_SESSION["nameError"] = "";
            $_SESSION['passwordError']  = "";
            $_SESSION['emailError']  = "successfully logged in as " . $_SESSION["name"];
            $_SESSION['success'] = "";           
            header("Location:" .  $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message'] = "Error Message";
            $_SESSION['action'] = " Take Me Back To Login";
            $_SESSION['emailError'] = "Wrong Password";
            $_SESSION['nameError'] = "";
            $_SESSION['passwordError']  = "";
            $_SESSION['success'] = "";
            header("Location:" .  $_SERVER['HTTP_REFERER']); 
        }} else{
        $_SESSION['message'] = "Error Message";
        $_SESSION['action'] = " Signup Instead";
        $_SESSION['emailError'] = "This account has not yet been registered";
        $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
        header("Location:" .  $_SERVER['HTTP_REFERER']);  
    }}
?>