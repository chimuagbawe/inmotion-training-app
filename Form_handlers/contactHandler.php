<?php
session_start();
include("../Database/connection.php");
include('../PHPMailer/PHPMailer-5.2-stable/PHPMailerAutoload.php');

$_SESSION['nameError'] = $_SESSION['emailError'] = $_SESSION['phoneError'] = $_SESSION["success"] = $_SESSION["categoryError"] = $_SESSION["reportError"] = '';

if(isset($_POST['submit'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['report'] = $_POST['report'];

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

    if (empty(trim($_SESSION["phone"]))) {
        $_SESSION['nameError'] = "Please enter Your phone number";
    } else if (!preg_match('/^[0-9]+$/', $_SESSION['phone'])) {
        $_SESSION['nameError'] = "Phone number must only contain numbers.";
    }    

    if(empty($_SESSION['category'])){
        $_SESSION['emailError'] = "This field is required.";
    }

    if(empty($_SESSION['report'])){
        $_SESSION['emailError'] = "This field is required.";
    }

if(empty($_SESSION["nameError"]) && empty($_SESSION['emailError']) && empty($_SESSION['phoneError']) && empty($_SESSION["categoryError"]) && empty($_SESSION['reportError'])) {
        $name = trim(htmlspecialchars($_SESSION['name']));
        $email = trim(htmlspecialchars($_SESSION['email']));
        $phone = trim(htmlspecialchars($_SESSION['phone']));
        $category = trim(htmlspecialchars($_SESSION['category']));
        $report = htmlspecialchars($_SESSION['report']);
        

$sql = "INSERT INTO Reach_Out (email, phone, category, report, laid_on) VALUES ('$email', '$phone', '$category', '$report', NOW())";
if (mysqli_query($con, $sql)) {
$currentDateTime = new DateTime();
$formattedDate = $currentDateTime->format("l, jS F Y");
$formattedTime = $currentDateTime->format("h:ia");

// echo "Current Formatted Date: $formattedDate<br>";
// echo "Current Formatted Time: $formattedTime";
    $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kingobioma8@gmail.com';
            $mail->Password = 'ebwfjnktjfexrgbn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('kingobioma8@gmail.com', 'Contacted Us');
            $mail->addAddress('kelvinozak0@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $category;
            $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        border: thick double #ff4e1d;
    }
    .header {
        background-color: #4285f4;
        color: #fff;
        padding: 20px;
    }
    .content {
        padding: 20px;
    }
    .button {
        display: inline-block;
        padding: 15px 30px;
        margin-top: 20px;
        background-color: #ff5a2c;
        color: white !important;
        text-decoration: none;
        border-radius: 5px;
    }
    .footer {
        background-color: #4285f4;
        color: #fff;
        padding: 10px;
        margin-top: 20px;
    }
    .footer p {
        margin: 0;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0;">' . $category . '</h1>
        </div>
        <div class="content">
            <p>Hello My name is <span style="color:#ff5a2c; cursor: pointer; font-weight:900">' . $name . '</span></p>
            <p>' . $report . '</p>
            <p>You can contact me on ' . $email . '. or call me on <span style="color:#ff5a2c; cursor: pointer; font-weight:900">' . $phone . '</span> as an alternative</p>
    <p>It might be important to note that i made this report on ' . $formattedDate . ' by ' . $formattedTime .'</p>
    <p>Thank You</p>
            
        </div>
    </div>
</body>

</html>';
if (!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
    die();
}

    $_SESSION['message'] = 'Success!!!';
    $_SESSION['action'] = "";
    $_SESSION["nameError"] = "successfully sent your message, Our Team will get to you soon!";
    $_SESSION['passwordError']  = "Thank you so much";
    $_SESSION['emailError']  = "";
    $_SESSION['success'] = "";
    header("Location: ../index.php");  
}
    }else{
        $_SESSION['message'] = 'Error Message';
        $_SESSION['action'] = "";
        // $_SESSION['nameError'] = "";
        // $_SESSION['emailError'] = "";
        // $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
        header("Location:" .  $_SERVER['HTTP_REFERER']);  
    }
}

?>