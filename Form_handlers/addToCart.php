<?php
session_start();
include("../Database/connection.php");

if (isset($_POST['course_id'])) {
    $courseId = mysqli_real_escape_string($con, $_POST['course_id']);
    $courseName = mysqli_real_escape_string($con, $_POST['course_name']);
    $userId = $_SESSION['loginId']; // Assume the user is logged in

    // Check if the course is already in the cart
    $checkQuery = "SELECT * FROM cart WHERE user_id = $userId AND course_id = $courseId";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) == 0) {
        // Course is not in the cart, add it
        $cartQuery = "SELECT courses.price
                      FROM cart
                      INNER JOIN courses ON cart.course_id = courses.id
                      WHERE cart.user_id = $userId";
        $cartResult = mysqli_query($con, $cartQuery);

        if ($cartResult) {
            $cartCourses = mysqli_fetch_all($cartResult, MYSQLI_ASSOC);
            $numCartCourses = count($cartCourses);

            if ($numCartCourses > 400) {
                $_SESSION['message'] = "Free Up Cart!!";
                $_SESSION['action'] = "";
                $_SESSION['emailError'] = "Cart is Filled Up";
                $_SESSION['nameError'] = "";
                $_SESSION['passwordError']  = "";
                $_SESSION['success'] = "";
                header("Location:" .  $_SERVER['HTTP_REFERER']); 
                exit(); // Added exit to stop execution after header redirection
            } else {
                $insertQuery = "INSERT INTO cart (user_id, course_id) VALUES ($userId, $courseId)";
                $insertResult = mysqli_query($con, $insertQuery);

                if ($insertResult) {
                    $cartQuery = "SELECT courses.price
                                  FROM cart
                                  INNER JOIN courses ON cart.course_id = courses.id
                                  WHERE cart.user_id = $userId";
                    $cartResult = mysqli_query($con, $cartQuery);

                    if ($cartResult) {
                        $totalPrice = 0;

                        // Iterate through the cart items and sum up the prices
                        while ($cartItem = mysqli_fetch_assoc($cartResult)) {
                            $coursePrice = $cartItem['price'];

                            // Handle 'Free' courses or remove '$' sign
                            if ($coursePrice != 'Free') {
                                $coursePrice = str_replace('$', '', $coursePrice);
                                $totalPrice += floatval($coursePrice);
                            }
                        }

                        // Now, $totalPrice contains the total price of courses in the cart
                        // $totalPrice = $totalPrice + 25.00;
                        $_SESSION['totalPrice'] = "$" . number_format($totalPrice, 2);
                        $totalPricing = $totalPrice + 25.00;
                        $_SESSION['totalPricing'] = "$" . number_format($totalPricing, 2);
                        $_SESSION['message'] = "Success!!";
                        $_SESSION['action'] = "";
                        $_SESSION['emailError'] = $courseName . "(Full Course) has been added to your cart.";
                        $_SESSION['nameError'] = "";
                        $_SESSION['passwordError']  = "";
                        $_SESSION['success'] = "";
                        header("Location:" .  $_SERVER['HTTP_REFERER']);  
                        exit(); // Added exit to stop execution after header redirection
                    } else {
                        echo "Error fetching cart items.";
                    }
                } else {
                    $_SESSION['cartMessage'] = 'Error adding course to cart.';
                }
            }
        }
    } else {
        $_SESSION['message'] = "Error!!";
        $_SESSION['action'] = "";
        $_SESSION['emailError'] = $courseName . " is already in your cart.";
        $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
    }

    header("Location:" .  $_SERVER['HTTP_REFERER']);
    exit(); // Added exit to stop execution after header redirection
} else {
    // Redirect to the course page if no course_id is provided
    header("Location: course.php");
    exit(); // Added exit to stop execution after header redirection
}
?>
