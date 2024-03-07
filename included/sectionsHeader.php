<?php
// Query to select courses uploaded by teachers in the Frontend-Web Development department
if ($_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseFrontend.php') {
    $section = 'Frontend-Web Development';
} elseif ($_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseBackend.php') {
    $section = 'Backend-Web Development';
} elseif ($_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseUi.php') {
    $section = 'User-Interface(UI) Design';
} elseif ($_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseUx.php') {
    $section = 'User-Experience(UX) Design';
} elseif ($_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseMobile.php') {
    $section = 'Mobile App Development';
}

$sql = "SELECT c.*, t.department
        FROM courses c
        INNER JOIN teachers t ON c.teacher_id = t.id
        WHERE t.department = '$section'
        ORDER BY c.created_at";

$result = mysqli_query($con, $sql);

if (!$result) {
    // Handle query execution error
    echo "Error executing the query: " . mysqli_error($con);
} else {
    if (mysqli_num_rows($result) > 0) {
        $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $noCourse = "No Course found";
        // You can handle this case as needed
    }
}
?>