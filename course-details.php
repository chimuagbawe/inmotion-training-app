<?php
session_start();
include("Database/connection.php");
if(!empty($_GET['id'])){
$id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "SELECT * FROM courses WHERE id = $id";
$result = mysqli_query($con, $sql);
$course = mysqli_fetch_assoc($result);
if($course){
    $teacherId = $course['teacher_id'];
    $_SESSION['courseId'] = $course['id'];
    $sql1 = "SELECT * FROM teachers WHERE id = $teacherId";
    $result1 = mysqli_query($con, $sql1);
    $teacher = mysqli_fetch_assoc($result1);
    $department = $teacher['department'];
    $userId = $teacher['user_id'];
    $sql2 = "SELECT * FROM users WHERE id = $userId";
    $result2 = mysqli_query($con, $sql2);
    $user = mysqli_fetch_assoc($result2);
    
if($department == 'Fullstack-Web Development'){
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
}else{
    if($user){
    $sql6 = "SELECT c.*, t.department
            FROM courses c
            INNER JOIN teachers t ON c.teacher_id = t.id
            WHERE t.department = '$department'
            ORDER BY c.created_at";
    $result6 = mysqli_query($con, $sql6);
    $courses = mysqli_fetch_all($result6, MYSQLI_ASSOC);
    }}
    if(isset($_SESSION['loginId'])){
    $realUserId = $_SESSION['loginId'];
    }else{
    $realUserId = "";
    }
    if($realUserId){
    $sql3 = "SELECT * FROM user_purchases WHERE user_id = $realUserId AND course_id = $id";
    $result3 = mysqli_query($con, $sql3);
    if($result3 && mysqli_num_rows($result3) > 0){
        $_SESSION['bought'] = "Course has been purchased";
    }else{
        $_SESSION['bought'] = "";
    }
  
    }
    $sql = "SELECT * FROM courses WHERE student_count >= 40 ORDER BY created_at DESC LIMIT 3";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
    // Fetch all rows
    $popularCourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // mysqli_close($con);
}else{
    header("Location: index.php");   
}}else{
    header("Location: course.php");  
}
include 'included/functions.php';
$counter = 0;

include('included/header.php');
?>


<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Course Details Page</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="course.php" title="">Course</a>
                        <a href="javascript:void()" title=""
                            class="active"><?php if($course){echo $course['title'];}?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End header -->
<?php include('included/signUp.php') ?>
<section class="blog_wrapper" id="courses_details_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="courses_details">
                    <div class="single-curses-contert">
                        <h2><?php if($course){echo $course['title'];}?></h2>
                        <div class="review-option">
                            <div class="teacher-info single_items single_items_shape">
                                <img src=<?php if($teacher){echo $teacher['Image'];}?> alt="" class="img-fluid">
                                <div class="teacher-name">
                                    <span>Teacher</span>
                                    <span><?php if($user){echo $user['full_name'];}?></span>
                                </div>
                            </div>
                            <div class="review-rank single_items single_items_shape">
                                <span>Reviews</span>
                                <div class="rank-icons">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-star review-icon"></i></li>
                                        <li><i class="fa fa-star review-icon"></i></li>
                                        <li><i class="fa fa-star review-icon"></i></li>
                                        <li><i class="fa fa-star review-icon"></i></li>
                                        <li><i class="fa fa-star review-icon"></i></li>
                                        <li><span>(8 Reviews)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="teacher_fee single_items ">
                                <span>Price</span>
                                <span class="courses_price"><?php if($course){echo $course['price'];}?></span>
                            </div>
                            <div class="buy_btn single_items" style="padding: 0px;">
                                <form method="post" action="Form_handlers\studentCountHandler.php">
                                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                                    <input type="hidden" name="course_name" value="<?php echo $course['title']; ?>">
                                    <?php if(isset($_SESSION['loginId']) && $_SESSION['bought'] == "Course has been purchased"): ?>
                                    <button type="button" style="border: none; cursor: not-allowed;" class="purchaseMe"
                                        title="Already bought by you"><a>Purchased!!</a></button>
                                    <?php elseif(isset($_SESSION['loginId']) && empty($_SESSION['bought'])): ?>
                                    <button type="submit" style="border: none" name="submit" class="buy-button">
                                        <a>Buy Now</a></button>
                                    <?php else: ?>
                                    <button type="button" style="border: none"
                                        class="nav-link sign-in js-modal-show"><a>Buy Now</a></button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                        <div class="details-img-bxo">
                            <img src=<?php if($course){echo $course['image'];}?> alt="" class="img-fluid"
                                style="min-width: 100%;">
                        </div>
                    </div>
                    <div class="courses_tab_wrapper">
                        <div class="courses_details_nav_tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" href="#information" role="tab"
                                        data-toggle="tab">Information</a></li>
                                <li class="nav-item"><a class="nav-link" href="#curricularm" role="tab"
                                        data-toggle="tab">Curricularm</a></li>
                                <li class="nav-item"><a class="nav-link" href="#instructor" role="tab"
                                        data-toggle="tab">Instructor</a></li>
                                <li class="nav-item"><a class="nav-link" href="#reviews" role="tab"
                                        data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab_contents tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="information">
                                <h3>Courses Description <span>:</span></h3>
                                <p><?php if($course){echo $course['courseDescription'];}?></p>
                                <div class="social_wrapper d-flex">
                                    <span>Share : </span>
                                    <ul class="social-items d-flex list-unstyled">
                                        <li><a href="javascript:void()"><i class="fab fa-facebook-f fb_icon"></i></a>
                                        </li>
                                        <li><a href="javascript:void()"><i class="fab fa-twitter tw_icon"></i></a></li>
                                        <li><a href="javascript:void()"><i class="fab fa-linkedin-in link_icon"></i></a>
                                        </li>
                                        <li><a href="javascript:void()"><i class="fab fa-instagram in_icon"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="curricularm">
                                <div class="curriculum-text-box">
                                    <div class="curriculum-section">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title click">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapse1" class="">
                                                            1. Welcome to the Courses<span>0/5</span></a>
                                                    </h4>

                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in show">
                                                    <div class="panel-body">
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapse2" class="collapsed">
                                                            2. How to use Wordpress<span>0/4</span></a>
                                                    </h4>
                                                </div>
                                                <div id="collapse2" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapse3" class="collapsed">
                                                            3. Final chapters<span>0/3</span></a>
                                                    </h4>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>
                                                        <div class="curriculum-single">
                                                            <div class="lecture">
                                                                <span><i class="fa fa-file-text-o"></i>Lecture 2.
                                                                    1</span>
                                                                <span><i class="fa fa-clock-o"></i>Duration:
                                                                    30mins</span>
                                                            </div>
                                                            <a href="javascript:void()">Preview</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- .curriculum-section-text END -->
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="instructor">
                                <div class="courses_teacher">
                                    <div class="tutor_signle">
                                        <div class="tutor_pro">
                                            <a href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>"
                                                title=""><img src=<?php if($teacher){echo $teacher['Image'];}?> alt=""
                                                    class="img-fluid"></a>
                                        </div>
                                        <div class="teachers_name">
                                            <h5><a href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>"
                                                    title=""><?php if($user){echo $user['full_name'];}?></a>
                                            </h5>
                                            <span><?php if($teacher){echo $teacher['programming_language'] . " Instructor";}?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <!-- Blog Comment Wrappper-->
                                <div class="review-content">
                                    <div class="five-star-rating">
                                        <div class="rating_box_count">
                                            <span class="five">5</span>
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <span>8 Ratings</span>
                                        </div>
                                    </div>
                                    <div class="rating-box">
                                        <div class="detailed-rating">
                                            <div class="stars">
                                                <div class="key">5 stars</div>
                                                <div class="bar">
                                                    <div class="full_bar">
                                                        <span style="width: 100%"></span>
                                                    </div>
                                                </div>
                                                <div class="value">8</div>
                                            </div>

                                            <div class="stars">
                                                <div class="key">4 stars</div>
                                                <div class="bar">
                                                    <div class="full_bar">
                                                        <span style="width: 0%"></span>
                                                    </div>
                                                </div>
                                                <div class="value">0</div>
                                            </div>

                                            <div class="stars">
                                                <div class="key">3 stars</div>
                                                <div class="bar">
                                                    <div class="full_bar">
                                                        <span style="width: 0%"></span>
                                                    </div>
                                                </div>
                                                <div class="value">0</div>
                                            </div>
                                            <div class="stars">
                                                <div class="key">2 stars</div>
                                                <div class="bar">
                                                    <div class="full_bar">
                                                        <span style="width: 0%"></span>
                                                    </div>
                                                </div>
                                                <div class="value">0</div>
                                            </div>
                                            <div class="stars">
                                                <div class="key">1 star</div>
                                                <div class="bar">
                                                    <div class="full_bar">
                                                        <span style="width: 0%"></span>
                                                    </div>
                                                </div>
                                                <div class="value">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="commnet-wrapper">
                                    <div class="comment-list-items">
                                        <div class="comment-list-wrapper">
                                            <div class="comment-list">
                                                <div class="commnet_img">
                                                    <img src="images/team/team_2.jpg" alt="member img"
                                                        class="img-fluid">
                                                </div>
                                                <div class="comment-text">
                                                    <div class="author_info d-flex justify-content-between">
                                                        <a href="javascript:void()" class="author_name">Adam Smith</a>
                                                        <span>2 Days Ago</span>
                                                    </div>
                                                    <div class="rating">
                                                        <ul class="rating d-flex justify-content-start">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p>You need to be sure there isn't anything embarrassing hidden
                                                        in the repeat predefined chunks as necessary, making this
                                                        the first true generator on the Internet.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-list-wrapper">
                                            <div class="comment-list">
                                                <div class="commnet_img">
                                                    <img src="images/team/team_4.jpg" alt="member img"
                                                        class="img-fluid">
                                                </div>
                                                <div class="comment-text">
                                                    <div class="author_info d-flex justify-content-between">
                                                        <a href="javascript:void()" class="author_name">David Martin</a>
                                                        <span>2 Days Ago</span>
                                                    </div>
                                                    <div class="rating">
                                                        <ul class="rating d-flex justify-content-start">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p>you need to be sure there isn't anything embarrassing hidden
                                                        in the repeat predefined chunks as necessary, making this
                                                        the first true generator on the Internet.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Blog Siderbar Left-->


            <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">
                    <div class="courses_features widget_single">
                        <div class="items-title">
                            <h3 class="title">Courses Features</h3>
                        </div>
                        <div class="features_items">
                            <ul class="list-unstyled">
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-page"></i> Lessons
                                    </a><span>69</span>
                                </li>
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-eye-open"></i>
                                        Viewers</a><span>56</span></li>
                                <li><a href="javascript:void(0);" title=""><i
                                            class="flaticon-clock-circular-outline"></i>
                                        Duration</a><span>5H</span></li>
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-padlock"></i>
                                        Prequisite</a><span>No</span></li>
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-diploma"></i>
                                        Certificate</a><span>Yes</span></li>
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-language"></i>
                                        Language</a><span>Eng</span></li>
                                <li><a href="javascript:void(0);" title=""><i
                                            class="flaticon-thumbs-up-hand-symbol"></i>
                                        Skills</a><span>Any</span></li>
                                <li><a href="javascript:void(0);" title=""><i class="flaticon-edit"></i>
                                        Assessments</a><span>Yes</span></li>
                            </ul>
                        </div>
                        <img src="images/shapes/testimonial_2_shpe_2.png" alt="" class="courses_feaures_shpe">
                    </div>



                    <div class="recent_post_wrapper popular_courses_post widget_single">
                        <div class="items-title">
                            <h3 class="title">Our Popular Courses</h3>
                        </div>
                        <?php foreach ($popularCourses as $popularCourse) { 
$dropTimestamp = strtotime($popularCourse['created_at']); // Replace this with your actual timestamp

// Calculate the time difference
$currentTimestamp = time();
$timeDifference = $currentTimestamp - $dropTimestamp;

// Convert the time difference to a human-readable format
$elapsedTime = formatElapsedTime($timeDifference);
$teacherIdentifier = $popularCourse['teacher_id'];
if(isset($teacherIdentifier)){
$sql7 = "SELECT * FROM teachers WHERE id = $teacherIdentifier";
$result7 = mysqli_query($con, $sql7);
$teacher = mysqli_fetch_assoc($result7);
}
$userId = $teacher['user_id'];
$sql2 = "SELECT * FROM users WHERE id = $userId";
$result2 = mysqli_query($con, $sql2);
$user = mysqli_fetch_assoc($result2);

?>
                        <div class="single-post">
                            <div class="recent_img">
                                <a href="course-details.php?id=<?php echo $popularCourse['id'];?>" title=""><img
                                        src=<?php echo htmlspecialchars($popularCourse['image']);?> alt=""
                                        class="img-fluid"></a>
                            </div>
                            <div class="post_title">
                                <a href="course-details.php?id=<?php echo $popularCourse['id'];?>"
                                    title=""><?php echo htmlspecialchars($popularCourse['title']);?></a>
                                <div class="courses_price">
                                    <div class="price"><span
                                            class="new_price"><?php echo htmlspecialchars($popularCourse['price']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="get_discount widget_single">
                        <div class="items-title">
                            <p>New Spcial Offers</p>
                            <h3>Get 35% Off</h3>
                            <a href="contact.php" title="">Get Started</a>
                        </div>

                        <img src="images/shapes/testimonial_2_shpe_2.png" alt="" class="courses_feaures_shpe">
                    </div>

                    <div class="archives widget_single">
                        <div class="items-title">

                            <h3 class="title">All Categories</h3>

                        </div>
                        <div class="archives-items">
                            <ul class="list-unstyled">
                                <li><a href="courseFrontend.php" title="">Front-end Development </a></li>
                                <li><a href="courseBackend.php" title="">Back-end Development</a></li>
                                <li><a href="courseFullstack.php" title="">Full-Stack</a></li>
                                <li><a href="courseUi.php" title="">User Interface(U.I) Design</a></li>
                                <li><a href="courseUx.php" title="">User Experience(U.X) Design</a></li>
                                <li><a href="courseMobile.php" title="">Mobile App Development</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- End Right Sidebar-->

        </div>
    </div>
</section><!-- ./ End  Blog Wrapper-->



<!--Start Courses Area Section-->
<section class="popular_courses" id="related_courses_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title">
                    <h2>Related Courses</h2>
                </div><!-- ends: .section-header -->
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div id="related_courses" class="owlCarousel">
                    <?php 
                $perPage = 90000; // Number of courses per page
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
                    <div class="single-courses">
                        <div class="courses_banner_wrapper">
                            <div class="courses_banner"><a href="course-details.php?id=<?php echo $course['id'];?>"><img
                                        src=<?php echo htmlspecialchars($course['image']);?> alt="" class="img-fluid"
                                        style="min-height:240px; max-height: 240px;"></a></div>
                            <div class="purchase_price">
                                <a href="javascript:void()"
                                    class="read_more-btn"><?php echo htmlspecialchars($course['price']);?></a>
                            </div>
                        </div>
                        <div class="courses_info_wrapper">
                            <div class="courses_title">
                                <h3><a
                                        href="course-details.php?id=<?php echo $course['id'];?>"><?php echo htmlspecialchars($course['title']);?></a>
                                </h3>
                                <div class="teachers_name">Teacher - <a
                                        href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>"
                                        title=""><?php if($user){echo $user['full_name'];}?></a></div>
                            </div>
                            <div class="courses_info">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-user"></i><?php echo htmlspecialchars($course['duration']);?>
                                    </li>
                                    <li><?php echo $course['student_count'] . " Students . " . $elapsedTime; ?></li>
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
                    <?php } ?>

                </div><!-- Ends: . -->
            </div>

        </div>
</section><!-- ./ End Courses Area section -->


<?php
include('included/footer.php');
?>