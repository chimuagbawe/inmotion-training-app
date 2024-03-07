<?php
session_start();
session_destroy();
$_SESSION['password'] = '';
unset($_SESSION);
$_SESSION = NULL;
$_SESSION['message'] = "SUCCESS!!!";
    // $_SESSION['action'] = " Login Instead";
    $_SESSION['emailError'] = "You have successfully logged out";
    $_SESSION['nameError'] = "";
$_SESSION['passwordError']  = "";
$_SESSION['success'] = "";
header('Location: ../index.php');