<?php
session_start();
include("../Database/connection.php");

$_SESSION['passwordError'] = "";

if(isset($_POST['submit'])){
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirmed'] = $_POST['confirmPassword'];

    if(empty($_SESSION['password'])){
        $_SESSION['passwordError'] = "password is required";
    }elseif(!preg_match('/^(?=.*[A-Z])(?=.*[@$!%*?&]).{6,}$/', $_SESSION['password'])) {
        $_SESSION['passwordError'] = "Password of at least 6 must contain one uppercase letter and one special character.";
    }
    // var_dump($_SESSION['password']);
    // var_dump($_SESSION['confirmed']);
    // die();

    if ($_SESSION['password'] == $_SESSION['confirmed']) {
        // Passwords match, reset the error
        $_SESSION['passwordConfirmError'] = "";
    } else {
        $_SESSION['passwordConfirmError'] = "Password does not match";
    }
    if(empty($_SESSION['passwordError']) && empty($_SESSION['passwordConfirmError'])){
        $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
        $email = mysqli_real_escape_string($con, trim(htmlspecialchars($_SESSION['email'])));
        $query = "UPDATE users SET pasword = '$password', uniqId = NULL WHERE email = '$email'";
        // var_dump($query);
        // die();
         $do = mysqli_query($con, $query);
         if($do){
             $_SESSION['message'] = 'Success!!!';
             $_SESSION['action'] = " Login";
             $_SESSION["emailError"] = "Password has been successfully updated";
             $_SESSION['passwordError']  = "";
             $_SESSION['nameError']  = "";
             $_SESSION['success'] = "";
             header('Location: ../index.php');
         }else{
            $_SESSION['message'] = 'Error Message';
             $_SESSION['action'] = " Recheck Mail-box";
             $_SESSION["emailError"] = "There was an error updating password";
             $_SESSION['passwordError']  = "";
             $_SESSION['nameError']  = "";
             $_SESSION['success'] = "";
             header('Location: ../index.php');
         }
    }else{
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}

?>