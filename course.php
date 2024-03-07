<?php
session_start();
include("Database/connection.php");

$sql = "SELECT * FROM courses ORDER BY created_at";
$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch the first row
    // $course = mysqli_fetch_assoc($result);

    if ($result && mysqli_num_rows($result) > 0) {
      
    } else {
        // Handle the case where no course is found
        $noCourse = "No Course found"; 
    }

    // Rewind the result set pointer
    mysqli_data_seek($result, 0);

    // Fetch all rows
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result); // Free the result set
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}

include 'included/functions.php';
if (isset($courses) && is_array($courses)) {
    // $totalCourses = count($courses);
    $perPage = 9; // Number of courses per page
    $totalCourses = count($courses); // Total number of courses
    $totalPages = ceil($totalCourses / $perPage); // Calculate total pages
    
    // Get current page or set it to 1 if not provided
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    
    // Calculate the starting index for courses on the current page
    $startIndex = ($page - 1) * $perPage;
    
    // Get courses for the current page
    $currentCourses = array_slice($courses, $startIndex, $perPage);
    // Rest of your code using $courses
} else {
    // Handle the case where $courses is not set or is null
    // $totalCourses = 0;
    $noCourse = "No Course found for the current department";
    header("Location: index.php");

}
include('included/header.php');
?>



<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Courses Page</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="#" title="" class="active">Course Page</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End Header -->
<?php include('included/signUp.php') ?>
<!--Start Courses Area Section-->
<!--Start Courses Area Section-->
<section class="popular_courses" id="popular_courses_page">
    <div class="container">
        <div class="row">

            <?php 
                $perPage = 9; // Number of courses per page
                $totalCourses = count($courses); // Total number of courses
                $totalPages = ceil($totalCourses / $perPage); // Calculate total pages
                
                // Get current page or set it to 1 if not provided
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                
                // Calculate the starting index for courses on the current page
                $startIndex = ($page - 1) * $perPage;
                
                // Get courses for the current page
                $currentCourses = array_slice($courses, $startIndex, $perPage);


                foreach ($currentCourses as $course) { 
                    $dropTimestamp = strtotime($course['created_at']); // Replace this with your actual timestamp
                    
                    // Calculate the time difference
                    $currentTimestamp = time();
                    $timeDifference = $currentTimestamp - $dropTimestamp;
                    
                    // Convert the time difference to a human-readable format
                    $elapsedTime = formatElapsedTime($timeDifference);
                    $teacherId = $course['teacher_id'];
                    
                    $sql1 = "SELECT * FROM teachers WHERE id = $teacherId";
                    $result1 = mysqli_query($con, $sql1);
                    $teacher = mysqli_fetch_assoc($result1);
                    
                    $userId = $teacher['user_id'];
                    $sql2 = "SELECT * FROM users WHERE id = $userId";
                    $result2 = mysqli_query($con, $sql2);
                    $user = mysqli_fetch_assoc($result2);
                    if(isset($_SESSION['loginId'])){
                    $userId1 = $_SESSION['loginId'];
                    $id = $course['id'];
                    $sql3 = "SELECT * FROM user_purchases WHERE user_id = $userId1 AND course_id = $id";
                    $result3 = mysqli_query($con, $sql3);
                    if($result3 && mysqli_num_rows($result3) > 0){
                    $_SESSION['bought'] = "Course has been purchased";
                    }else{
                    $_SESSION['bought'] = "";
                    }
                    }
                    
                    ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="course-details.php?id=<?php echo $course['id'];?>"><img
                                    src=<?php echo htmlspecialchars($course['image']);?> alt="" class="img-fluid"
                                    style="min-height:240px; max-height: 240px;"></a></div>
                        <div class="purchase_price">
                            <a href="course-details.php?id=<?php echo $course['id'];?>"
                                class="read_more-btn"><?php echo htmlspecialchars($course['price']);?></a>
                        </div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a
                                    href="course-details.php?id=<?php echo $course['id'];?>"><?php echo htmlspecialchars($course['title']);?></a>
                            </h3>
                            <div class="teachers_name">Teacher - <a
                                    href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>" title="">
                                    <?php if($user){echo $user['full_name'];}?></a>
                            </div>
                        </div>
                        <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i
                                        class="fas fa-calendar-alt"></i><?php echo htmlspecialchars($course['duration']);?>
                                </li>
                                <li><i class="fas fa-user"></i><?php echo $course['student_count'] . " Students"?>
                                </li>
                                <!-- <li></li> -->
                            </ul>
                            <form method="post" action="Form_handlers\addToCart.php">
                                <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                                <input type="hidden" name="course_name" value="<?php echo $course['title']; ?>">
                                <?php if(isset($_SESSION['loginId']) && $_SESSION['bought'] == "Course has been purchased"): ?>
                                <button type="button" style="border: none; cursor: not-allowed;" class="cart_btn"
                                    title="Already bought by you">Purchased!!</button>
                                <?php elseif(isset($_SESSION['loginId']) && empty($_SESSION['bought'])): ?>
                                <button type="submit" style="border: none" name="submit" class="cart_btn">Add to
                                    Cart</button>
                                <?php else: ?>
                                <button type="button" style="border: none"
                                    class="cart_btn nav-link apply_btn sign-in js-modal-show">Add to
                                    Cart</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div><!-- Ends: .single courses -->

            </div><!-- Ends: . -->

            <?php } ?>

        </div>
        <h1 style="color:gray; text-align: center">
            <?php if(isset($noCourse)){echo $noCourse;}?>
        </h1>
    </div>
    <?php
include('included\pagination.php');
        ?>

</section><!-- ./ End Courses Area section -->
<?php
include('included/footer.php');
?>