<?php
session_start();
include("../Database/connection.php");

$userId = $_SESSION['loginId'];

// Fetch courses from the cart for the logged-in user
$cartQuery = "SELECT cart.course_id, courses.title, courses.price
              FROM cart
              INNER JOIN courses ON cart.course_id = courses.id
              WHERE cart.user_id = ?";
$cartStmt = mysqli_prepare($con, $cartQuery);

if (!$cartStmt) {
    die('Error preparing cart statement: ' . mysqli_error($con));
}

mysqli_stmt_bind_param($cartStmt, "i", $userId);
mysqli_stmt_execute($cartStmt);
$cartResult = mysqli_stmt_get_result($cartStmt);

if (!$cartResult) {
    die('Error fetching cart items: ' . mysqli_error($con));
}

$emailErrorMessages = '';
$totalAmountSpent = 0; // Initialize the total amount spent variable

// Process each course in the cart
while ($cartItem = mysqli_fetch_assoc($cartResult)) {
    $courseId = $cartItem['course_id'];
    $courseTitle = $cartItem['title'];
    $coursePrice = $cartItem['price'];

    // Update the total amount spent
    if ($coursePrice != 'Free') {
        $coursePrice = str_replace('$', '', $coursePrice);
        $totalAmountSpend += floatval($coursePrice);
        $totalAmountSpent = $totalAmountSpend . " dollars";
    }

    // Insert the course into the user_purchases table
    $insertQuery = "INSERT INTO user_purchases (user_id, course_id, purchase_date)
                    VALUES (?, ?, NOW())";
    $insertStmt = mysqli_prepare($con, $insertQuery);

    if (!$insertStmt) {
        die('Error preparing insert statement: ' . mysqli_error($con));
    }

    mysqli_stmt_bind_param($insertStmt, "ii", $userId, $courseId);
    $updateSql = "UPDATE courses SET student_count = student_count + 1 WHERE id = ?";
    $updateStmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "i", $courseId);
    
    if (mysqli_stmt_execute($updateStmt)) {
    if (mysqli_stmt_execute($insertStmt)) {
        // Remove the course from the cart after successful purchase
        $deleteQuery = "DELETE FROM cart WHERE user_id = ? AND course_id = ?";
        $deleteStmt = mysqli_prepare($con, $deleteQuery);

        if (!$deleteStmt) {
            die('Error preparing delete statement: ' . mysqli_error($con));
        }

        mysqli_stmt_bind_param($deleteStmt, "ii", $userId, $courseId);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);
        // $emailErrorMessages .= $courseTitle . "(Full Course) has been successfully purchased for " . $coursePrice . ".<br>";       
    } else {
        // Handle the purchase query error
        die('Error purchasing course: ' . mysqli_error($con));
    }}else {
        // Handle the purchase query error
        die('Error purchasing course: ' . mysqli_error($con));}

    mysqli_stmt_close($insertStmt);
}

// Update the total amount spent in the user's session
if($_SESSION['numCartCourses'] > 1) {
$numCartCourses = $_SESSION['numCartCourses'] . " courses";
}else{
$numCartCourses = " a course";
}
$_SESSION['totalAmountSpent'] = $totalAmountSpent;
if($totalAmountSpent == 0){
    $totalAmountSpent = 'Free';
}

$_SESSION['message'] = "Success!!";
$_SESSION['action'] = "";
$_SESSION['emailError'] = "You have successfully purchased $numCartCourses for $totalAmountSpent.";
$_SESSION['nameError'] = "";
$_SESSION['passwordError']  = "";
$_SESSION['success'] = "";

// Redirect to the cart or any other page after processing all courses
header("Location: ../index.php");
exit();
?>