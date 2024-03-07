<?php
session_start();
include("Database/connection.php");

$targetDepartments = ['Fullstack-Web Development', 'Frontend-Web Development', 'Backend-Web Development'];

// Generate a comma-separated list of quoted department names
$departmentList = "'" . implode("','", $targetDepartments) . "'";

$sql = "SELECT c.*, t.department
        FROM courses c
        INNER JOIN teachers t ON c.teacher_id = t.id
        WHERE t.department IN ($departmentList)
        ORDER BY c.created_at DESC";

$result = mysqli_query($con, $sql);


if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $noCourse = "No Course found";
    }
    mysqli_free_result($result); // Free the result set
} else {
    // Debugging: Print MySQL error message
    echo "Query failed: " . mysqli_error($con);
}

include 'included/functions.php';
include('included/header.php');
?>
<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Full-Stack Development</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void(0);" title=""
                            class="active"><?php echo "Over " . $_SESSION['fullstackCount'] + $_SESSION['backendCount'] + $_SESSION['frontendCount'] . " Courses";?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End Header -->
<?php include('included/signUp.php') ?>
<!--Start Courses Area Section-->
<section class="popular_courses" id="related_courses_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title">
                    <h2>Total Spectrum Web Development Excellence</h2>
                </div><!-- ends: .section-header -->
            </div>
            <?php
include('included\sections.php');
include('included/footer.php');
?>