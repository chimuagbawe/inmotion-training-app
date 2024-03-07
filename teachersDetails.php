<?php
session_start();
include("Database/connection.php");
if(isset($_GET['id'])){
    
$id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "SELECT * FROM teachers WHERE id = $id";
$result = mysqli_query($con, $sql);
$teacher = mysqli_fetch_assoc($result);
if($teacher){
$userId = $teacher['user_id'];
$sql1 = "SELECT * FROM users WHERE id = $userId";
$result1 = mysqli_query($con, $sql1);
$user = mysqli_fetch_assoc($result1);
if($user){
$sql2 = "SELECT * FROM courses WHERE teacher_id = $id";
$result2 = mysqli_query($con, $sql2);
$courses = mysqli_fetch_all($result2, MYSQLI_ASSOC);
if(empty($courses)){
    $noCourse = 'No courses found';
}
}
mysqli_free_result($result1);
// mysqli_close($con);
}else{
    header("Location: course.php");   
}}else{
    header("Location: course.php");   
}
include('included/teachersMessage1.php');
include 'included/functions.php';
include('included/header.php');

?>


<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1><?php if($user){echo $user['full_name'];}?></h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void()" title="" class="active">Teacher profile</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End header -->
<?php
include('included/signUp.php');
?>
<section class="teachers_profile">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 teacher-detail-left">
                <div class="teacher_info_wrapper">
                    <div class="teacger-image">
                        <img src=<?php if($teacher){echo $teacher['Image'];}?> alt="" class="img-fluid"
                            style="min-width: 100%;">
                    </div>
                    <div class="social_wraper">
                        <ul class="social-items d-flex list-unstyled">
                            <li><a href="javascript:void(0);"><i class="fab fa-facebook-f fb-icon"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fab fa-twitter twitt-icon"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in link-icon"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fab fa-instagram ins-icon"></i></a></li>
                        </ul>
                    </div>
                    <div class="teacher-skills" style="padding-top: 0px;">
                        <?php if($teacher["department"] == "Frontend-Web Development"){?>
                        <div class="skill-single">
                            <span>HTML - <span class="skills_lavel">80%</span></span>
                            <span><span style="width:80%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span><?php echo $teacher["programming_language"] ?> - <span
                                    class="skills_lavel">70%</span></span>
                            <span><span style="width:70%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Photoshop - <span class="skills_lavel">90%</span></span>
                            <span><span style="width:90%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>CSS - <span class="skills_lavel">75%</span></span>
                            <span><span style="width:75%;"></span></span>
                        </div>
                        <?php }elseif($teacher["department"] == "Backend-Web Development"){?>
                        <div class="skill-single">
                            <span>HTML - <span class="skills_lavel">80%</span></span>
                            <span><span style="width:80%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Wordpress - <span class="skills_lavel">70%</span></span>
                            <span><span style="width:70%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span><?php echo $teacher["programming_language"] ?> - <span
                                    class="skills_lavel">90%</span></span>
                            <span><span style="width:90%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Bootstrap5 - <span class="skills_lavel">75%</span></span>
                            <span><span style="width:75%;"></span></span>
                        </div>
                        <?php }elseif($teacher["department"] == "Fullstack-Web Development"){?>
                        <div class="skill-single">
                            <span><?php echo $teacher["programming_language"] ?> - <span
                                    class="skills_lavel">80%</span></span>
                            <span><span style="width:80%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Wordpress - <span class="skills_lavel">70%</span></span>
                            <span><span style="width:70%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>SQL - <span class="skills_lavel">90%</span></span>
                            <span><span style="width:90%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>CSS3 - <span class="skills_lavel">75%</span></span>
                            <span><span style="width:75%;"></span></span>
                        </div>
                        <?php }elseif($teacher["department"] == "Mobile App Development"){?>
                        <div class="skill-single">
                            <span><?php echo $teacher["programming_language"] ?> - <span
                                    class="skills_lavel">80%</span></span>
                            <span><span style="width:80%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Kotlin - <span class="skills_lavel">70%</span></span>
                            <span><span style="width:70%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Swift - <span class="skills_lavel">90%</span></span>
                            <span><span style="width:90%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Realm - <span class="skills_lavel">75%</span></span>
                            <span><span style="width:75%;"></span></span>
                        </div>
                        <?php }else{?>
                        <div class="skill-single">
                            <span>Electron - <span class="skills_lavel">70%</span></span>
                            <span><span style="width:70%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span><?php echo $teacher["programming_language"] ?> - <span
                                    class="skills_lavel">80%</span></span>
                            <span><span style="width:80%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Git - <span class="skills_lavel">90%</span></span>
                            <span><span style="width:90%;"></span></span>
                        </div>
                        <div class="skill-single">
                            <span>Java with JavaFX - <span class="skills_lavel">75%</span></span>
                            <span><span style="width:75%;"></span></span>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div><!-- Ends: .teacher-detail-left -->
            <div class="col-sm-8 teacher-detail-right">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="teacher-info">
                            <ul class="list-unstyled">
                                <li>
                                    <h3>Name :</h3>
                                    <span><?php if($user){echo $user['full_name'];}?></span>
                                </li>
                                <li>
                                    <h3>Department :</h3>
                                    <span><?php if($teacher){echo $teacher['department'];}?></span>
                                </li>
                                <li>
                                    <h3>Experience :</h3>
                                    <span><?php if($teacher){echo $teacher['experience'] . " Of Teaching Mastery";}?></span>
                                </li>
                                <li>
                                    <h3>Language :</h3>
                                    <span><?php if($teacher){echo $teacher['spoken_language'];}?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="teacher-contact">
                            <h2>Contact Us</h2>
                            <form action="#">
                                <input type="text" placeholder="Your Name*"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["name"];}?>"
                                    required>
                                <input type="email" placeholder="Email*"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["email"];}?>"
                                    required>
                                <textarea>Your Message</textarea>
                                <button type="submit">Submit Your Request</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="courses_tab_wrapper">
                            <div class="courses_details_nav_tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#information" role="tab"
                                            data-toggle="tab"><i class="flaticon-info-sign"></i>About Insructor</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#curricularm" role="tab"
                                            data-toggle="tab"><i class="flaticon-portfolio"></i>Qualification</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#courses" role="tab"
                                            data-toggle="tab"><i class="flaticon-portfolio"></i>Courses</a></li>
                                </ul>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab_contents tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="information">
                                    <?php echo $aboutTeacher1 ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="curricularm">
                                    <?php echo $qualified ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="courses">
                                    <!-- courses -->
                                    <div class="popular_courses">
                                        <div class="row">
                                            <?php foreach ($courses as $course) { 
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

                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="single-courses">
                                                    <div class="courses_banner_wrapper">
                                                        <div class="courses_banner"><a
                                                                href="course-details.php?id=<?php echo $course['id'];?>"><img
                                                                    src=<?php echo htmlspecialchars($course['image']);?>
                                                                    alt="" class="img-fluid"
                                                                    style="min-height:240px; max-height: 240px;"></a>
                                                        </div>
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
                                                                    title="">
                                                                    <?php if($user){echo $user['full_name'];}?></a>
                                                            </div>
                                                        </div>
                                                        <div class="courses_info">
                                                            <ul class="list-unstyled">
                                                                <li><i
                                                                        class="fas fa-calendar-alt"></i><?php echo htmlspecialchars($course['duration']);?>
                                                                </li>
                                                                <li><?php echo $course['student_count'] . " Students . " . $elapsedTime; ?>
                                                                </li>
                                                                <!-- <li></li> -->
                                                            </ul>
                                                            <form method="post" action="Form_handlers\addToCart.php">
                                                                <input type="hidden" name="course_id"
                                                                    value="<?php echo $course['id']; ?>">
                                                                <?php if(isset($_SESSION['loginId']) && $_SESSION['bought'] == "Course has been purchased"): ?>
                                                                <button type="button"
                                                                    style="border: none; cursor: not-allowed;"
                                                                    class="cart_btn"
                                                                    title="Already bought by you">Purchased!!</button>
                                                                <?php elseif(isset($_SESSION['loginId']) && empty($_SESSION['bought'])): ?>
                                                                <button type="submit" style="border: none" name="submit"
                                                                    class="cart_btn">Add to
                                                                    Cart</button>
                                                                <?php else: ?>
                                                                <button type="button" style="border: none"
                                                                    class="cart_btn nav-link apply_btn sign-in js-modal-show">Add
                                                                    to
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

                                    </div><!-- Ends: . -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Ends: .teacher-detail-right -->
        </div>
    </div>
</section><!-- Ends: .teacher-details-wrapper -->




<?php
include('included/footer.php');
?>