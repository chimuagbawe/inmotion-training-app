<?php
session_start();
include("../Database/connection.php");
$_SESSION['eventNameError'] = $_SESSION['eventDateError'] = $_SESSION['eventTimeError'] = $_SESSION['eventPriceError'] = $_SESSION['eventImageError'] = $_SESSION['eventPricePlanError'] = $_SESSION['eventTypeError'] = $_SESSION['eventDescriptionError'] = "";
function handle_error_redirect($location, $error_message) {
    $_SESSION['error_message'] = $error_message;
    header("Location: $location");
    exit();
}
$dbImage = "";
$directory = "../Images/assets/events/";
if (isset($_POST["submit"])) {
    $_SESSION['eventName'] = $_POST["eventName"];
    $_SESSION['eventDate'] = $_POST["eventDate"];
    $_SESSION['eventTime'] = $_POST["eventTime"];
    $_SESSION['eventImage'] = $_FILES["eventImage"];
    // var_dump($_FILES['eventImage']);
    // die();
    if (isset($_POST["eventPrice"])) {
        $_SESSION['eventPrice'] = $_POST["eventPrice"];
    } else {
        $_SESSION['eventPrice'] = 'Free';
    }
    // $_SESSION['eventPricePlan'] = $_POST["eventPricePlan"];
    $_SESSION['eventType'] = $_POST["eventType"];
    $_SESSION['eventDescription'] = $_POST["eventDescription"];

    //Event Name
    if (empty($_SESSION['eventName'])) {
        $_SESSION['eventNameError'] = 'Event Title field is required';
    } else if (str_word_count($_SESSION['eventName']) > 10) {
        $_SESSION['eventNameError'] = 'Event Title should not exceed 10 words.';
    }
   
// Event Date

    if (empty($_SESSION['eventDate'])) {
        $_SESSION['eventDateError'] = 'This field is required';
    } else if (!preg_match('/^\d{1,2}\s+(January|February|March|April|May|June|July|August|September|October|November|December)\s+\d{4}$/', $_SESSION['eventDate'])) {
        $_SESSION['eventDateError'] = 'Must be in the format "25 September 2019".';
    }

// Event Time

    if(empty($_SESSION['eventTime'])){
        $_SESSION['eventTimeError'] = "This field is required";
    }else if (!preg_match('/^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday) \d{1,2}:\d{2}[ap]m-\d{1,2}:\d{2}[ap]m$/', $_SESSION['eventTime'])) {
        $_SESSION['eventTimeError'] = "Invalid time format. Example: 'Friday 3:00pm-4:00pm'.";
    }

// Event price

if (isset($_POST["eventPrice"])) {
    if (!preg_match('/^\$\d+(\.\d{2})?$/', $_SESSION['eventPrice'])) {
        if ($_POST['eventPricePlan'] == 'Paid') {
            $_SESSION['eventPriceError'] = 'Price must be in Dollars';
        }
    }
} else {
    $_SESSION['coursePriceError'] = "";
}

// Event Type

if(empty($_SESSION['eventType'])){
    $_SESSION['eventTypeError'] = 'This field is required';
}

if (empty($_SESSION['eventDescription'])) {
    $_SESSION['eventDescriptionError'] = 'Please Describe your event above';
} else {
    $cleanDescription = strip_tags($_SESSION['eventDescription']);
    if (str_word_count($cleanDescription) > 250) {
        $_SESSION['eventDescriptionError'] = "event description is too long(250 words is the maximum allowed)";
    }
}
    
if(empty($_SESSION['eventNameError']) && empty($_SESSION['eventDateError']) && empty($_SESSION['eventDateError']) && empty($_SESSION['eventTypeError']) && empty($_SESSION['eventDescriptionError'])){
    $fileExtension = pathinfo($_FILES["eventImage"]["name"], PATHINFO_EXTENSION);
    $filename = uniqid('eventImage', true) . $fileExtension;
    $target_file = $directory . basename($filename);

    if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $target_file)) {
        $dbImage = "images/assets/events/" . $filename;
    } else {
        // Redirect with an error message
        // if ($_FILES['eventImage']['error'] !== UPLOAD_ERR_OK) {
        //     handle_error_redirect('../createEvents.php', 'File upload failed with error code: ' . $_FILES['eventImage']['error']);
        // }
        header("Location: ../createEvents.php?error=FileUploadFailed");
        exit();
    }
    if(isset($_SESSION) && isset($_SESSION['id'])){
        $id = $_SESSION["id"];
    }else{
        $id = NULL;
    }

    $name = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventName'])));
    $date = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventDate'])));
    $time = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventTime'])));
    $type = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventType'])));
    $price = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventPrice'])));
    $description = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['eventDescription'])));
    $teachersName = mysqli_real_escape_string($con, $_SESSION["name"]);

     
    $sql = "INSERT INTO events (`id`, `teacher_id`, `title`, `time`, `date`, `price`, `email`, `location`, `phone`, `eventDescription`, `image`, `created_at`, `type`) VALUES (NULL, '$id', '$name', '$time', '$date', '$price', 'hello@inmotionhub.com', 'KM 46 East West Road, Beside Cima Petrol Station, Nkpolu-Rumuigbo, Port Harcourt.', '+234 9060400096',  '$description', '$dbImage', NOW(), '$type')";


    if (mysqli_query($con, $sql)) {
        $_SESSION['eventName'] = '';
        $_SESSION['eventDate'] = '';
        $_SESSION['eventTime'] = '';
        $_SESSION['eventDescription'] = '';
        header('location: ../teacher-profile.php');
        exit();
    } else {
        // Redirect to the create course page with an error message
        header('location: ../createEvents.php?error=DatabaseError' . mysqli_error($con));
        exit();
    }
} else {
    // Redirect to the create course page with validation errors
    header('location: ../createEvents.php');
    exit();
}


    
}
?>