<?php 
session_start();
include("../Database/connection.php");
$userId = $_SESSION["loginId"];
if(isset($_GET['id']) && isset($_GET['n'])){
  $courseId = htmlspecialchars($_GET['id']); 
  $courseName = htmlspecialchars($_GET['n']); 
  $deleteQuery = "DELETE FROM cart WHERE user_id = $userId AND course_id = $courseId";
  $deleteResult = mysqli_query($con, $deleteQuery);
  if($deleteResult) {
      // $_SESSION['cartMessage'] = 'Course removed from the cart.';
      $_SESSION['message'] = "Success!!!";
      // $_SESSION['action'] = " Login Instead";
      $_SESSION['emailError'] = $courseName . " is no more in your cart";
      $_SESSION['nameError'] = "";
  $_SESSION['passwordError']  = "";
  $_SESSION['success'] = "";
  } else {
      // $_SESSION['cartMessage'] = 'Error removing course from the cart.';
      $_SESSION['message'] = "Error Message";
      // $_SESSION['action'] = " Login Instead";
      $_SESSION['emailError'] = "Error removing course from the cart.";
      $_SESSION['nameError'] = "";
  $_SESSION['passwordError']  = "";
  $_SESSION['success'] = "";
  }
  header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>