<?php
session_start();
include("../Database/connection.php");

// Fetch courses from the database
$_SESSION['course_id'] = $_POST['course_id'];
$courseName = $_POST['course_name'];
$courseId = $_SESSION['course_id'];
$sql = "SELECT id, title, student_count FROM courses WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $courseId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    // Handle the query error     
    die('Error in SQL query: ' . mysqli_error($con));
} else {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courseId = $row['id'];
            $courseTitle = $row['title'];
            $studentCount = $row['student_count'];

            // Check if the user has already purchased the course using a prepared statement
            $userId = $_SESSION["loginId"];
            $userPurchasedSql = "INSERT INTO user_purchases (id, user_id, course_id) VALUES (NULL, ?, ?)";
            $userPurchasedStmt = mysqli_prepare($con, $userPurchasedSql);
            mysqli_stmt_bind_param($userPurchasedStmt, "ii", $userId, $courseId);
            
            if (mysqli_stmt_execute($userPurchasedStmt)) {
                // If purchase is successful, update the student count
                $updateSql = "UPDATE courses SET student_count = student_count + 1 WHERE id = ?";
                $updateStmt = mysqli_prepare($con, $updateSql);
                mysqli_stmt_bind_param($updateStmt, "i", $courseId);
                
                if (mysqli_stmt_execute($updateStmt)) {
                    $deleteQuery = "DELETE FROM cart WHERE user_id = $userId AND course_id = $courseId";
                    $deleteResult = mysqli_query($con, $deleteQuery);
                    
                    if ($deleteResult) {
                        $_SESSION['cartMessage'] = 'Course removed from the cart.';
                        $_SESSION['message'] = "Success!!";
                        $_SESSION['action'] = "";
                        $_SESSION['emailError'] = $courseName . "(Full Course) has been successfully Purchased.";
                        $_SESSION['nameError'] = "";
                        $_SESSION['passwordError']  = "";
                        $_SESSION['success'] = "";
                    } else {
                        $_SESSION['cartMessage'] = 'Error removing course from the cart.';
                    }
                    header("Location:" . $_SERVER['HTTP_REFERER']);

                } else {
                    // Handle the update query error
                    die('Error updating student count: ' . mysqli_error($con));
                }
            } else {
                // Handle the purchase query error
                die('Error purchasing course: ' . mysqli_error($con));
            }
        }
    }
}

// Close prepared statements
mysqli_stmt_close($stmt);
mysqli_stmt_close($userPurchasedStmt);
mysqli_stmt_close($updateStmt);
?>