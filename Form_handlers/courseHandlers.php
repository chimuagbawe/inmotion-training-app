<?php
session_start();
include("../Database/connection.php");

$_SESSION['courseNameError'] = $_SESSION['courseDurationError'] = $_SESSION['coursePriceError'] = $_SESSION['courseDescriptionError'] = "";

$dbImage = "";
$directory = "../Images/assets/courses/";

if (isset($_POST["submit"])) {
    $_SESSION['courseName'] = $_POST["courseName"];
    $_SESSION['courseDuration'] = $_POST["courseDuration"];
    $_SESSION['courseImage'] = $_FILES["imageUpload"];

    if (isset($_POST["coursePrice"])) {
        $_SESSION['coursePrice'] = $_POST["coursePrice"];
    } else {
        $_SESSION['coursePrice'] = 'Free';
    }
    $_SESSION['courseDescription'] = $_POST["courseDescription"];

    // Add more specific error messages for debugging
    if (empty($_SESSION['courseName'])) {
        $_SESSION['courseNameError'] = 'Course Title field is required';
    } else if (!preg_match('/^[\p{L}\s]{1,28}$/u', $_SESSION['courseName'])) {
        $_SESSION['courseNameError'] = 'Course Title is too long.';
    }
    

    if (empty($_SESSION['courseDuration'])) {
        $_SESSION['courseDurationError'] = 'Course Duration field is required';
    } else if (!preg_match('/^\d+\s*days$/', $_SESSION['courseDuration'])) {
        $_SESSION['courseDurationError'] = "Must be a combination of numbers followed by 'days'.";
    }

    if (isset($_POST["coursePrice"])) {
        if (!preg_match('/^\$\d+(\.\d{2})?$/', $_SESSION['coursePrice'])) {
            if ($_POST['courseType'] == 'Paid') {
                $_SESSION['coursePriceError'] = 'Price must be in Dollars';
            }
        }
    } else {
        $_SESSION['coursePriceError'] = "";
    }

    if (empty($_SESSION['courseDescription'])) {
        $_SESSION['courseDescriptionError'] = 'Please Describe your course above';
    } else {
        $cleanDescription = strip_tags($_SESSION['courseDescription']);
        if (str_word_count($cleanDescription) > 650) {
            $_SESSION['courseDescriptionError'] = "Course description is too long(650 words is the maximum allowed)";
        }
    }

    if (empty($_SESSION['courseNameError']) && empty($_SESSION['courseDurationError']) && empty($_SESSION['coursePriceError']) && empty($_SESSION['courseDescriptionError'])) {
        $fileExtension = pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION);
        $filename = uniqid('courseImage', true) . $fileExtension;
        $target_file = $directory . basename($filename);

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            $dbImage = "images/assets/courses/" . $filename;
        } else {
            // Redirect with an error message
            header("Location: ../createCourse.php?error=FileUploadFailed");
            exit();
        }
        if(isset($_SESSION) && isset($_SESSION['id'])){
            $id = $_SESSION["id"];
        }else{
            $id = NULL;
        }
        $name = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['courseName'])));
        $duration = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['courseDuration'])));
        $price = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['coursePrice'])));
        $description = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['courseDescription'])));
        $teachersName = mysqli_real_escape_string($con, $_SESSION["name"]);
        
        $sql = "INSERT INTO courses (`id`, `teacher_id`, `title`, `duration`, `price`, `courseDescription`, `image`, `created_at`, student_count)
        VALUES (NULL, '$id', '$name', '$duration', '$price', '$description', '$dbImage', NULL, '0')";
        
        // var_dump($sql);
        // die();

        if (mysqli_query($con, $sql)) {
            $_SESSION['courseName'] = "";
            $_SESSION['courseDuration'] = "";
            $_SESSION['courseDescription'] = "";
            // Redirect to the teacher profile page on success
            header('location: ../teacher-profile.php');
            exit();
        } else {
            // Redirect to the create course page with an error message
            header('location: ../createCourse.php?error=DatabaseError' . mysqli_error($con));
            exit();
        }
    } else {
        // Redirect to the create course page with validation errors
        header('location: ../createCourse.php');
        exit();
    }
}
?>