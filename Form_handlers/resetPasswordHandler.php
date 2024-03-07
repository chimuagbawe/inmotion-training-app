<?php
session_start();
include("../Database/connection.php");
include('../PHPMailer/PHPMailer-5.2-stable/PHPMailerAutoload.php');

$_SESSION['emailError'] = "";

if(isset($_POST['submit'])){
    $_SESSION['email'] = $_POST['email'];

    if(empty($_SESSION['email'])){
        $_SESSION['emailError'] = "Email is required";
    } else if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailError'] = "Invalid email";
    }

    if(empty($_SESSION['emailError'])){
        $email = mysqli_real_escape_string($con, trim(htmlspecialchars($_SESSION['email'])));
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
            $name = $user['full_name'];
            function generateUniqueID() {
                $prefix = uniqid(); // Get a unique identifier
                $randomPart = bin2hex(random_bytes(4)); // Generate a random hexadecimal string
            
                // Combine the prefix, a timestamp, and the random part
                $uniqueID = $prefix . time() . $randomPart;
            
                // You can also add more complexity by using additional functions like md5 or sha1
                $uniqueID = md5($uniqueID);
            
                return $uniqueID;
            }
            $userID = generateUniqueID();
            $timestamp = date("Y-m-d H:i:s", strtotime("+30 minutes")); // OTP valid for 15 minutes
            $query = "UPDATE users SET uniqId = '$userID', uniqIdTimestamp = '$timestamp' WHERE email = '$email'";
            mysqli_query($con, $query);
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kingobioma8@gmail.com';
            $mail->Password = 'ebwfjnktjfexrgbn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('kingobioma8@gmail.com', 'Inmotion-ICT Hub');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Password Reset";
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
            <h1 style="margin: 0;">Password Reset</h1>
        </div>
        <div class="content">
            <p>Hello <span style="color:#ff5a2c; cursor: pointer; font-weight:900">' . $name . '</span></p>
            <p>We received a request to reset your password. Click the link below to reset your password:<p style="color:#ff5a2c; cursor: pointer; font-weight:900"> only valid for 15 MINUTES</p></p>
            <a class="button" href="http://localhost/inmotionHubIct/resetNow.php?unique=' . $userID . '">Reset Password</a>
            <p>If you did not request a password reset, you can safely ignore this email.</p>
            
        </div>
        <div class="footer">
            <p>Best regards,<br>Inmotion-ICT Hub</p>
        </div>
    </div>
</body>

</html>';
            $_SESSION['uni'] = $userID;
            $mail->Send();
            $_SESSION['message'] = "Successfully sent";
            $_SESSION['action'] = " View mail-box";
            $_SESSION['emailError'] = "Check your email for further instructions";
           header("Location: ../index.php");

        } else {
            $_SESSION['message'] = "Error Message";
            $_SESSION['action'] = " Signup Instead";
            $_SESSION['emailError'] = "This account has not yet been registered";
            $_SESSION['nameError'] = "";
            $_SESSION['passwordError']  = "";
            $_SESSION['success'] = "";
            header("Location: ../index.php");
        }

    } else {
        header("Location: ../forgot-password.php");
    }
}
?>