<?php
session_start();
include("Database/connection.php");

$sql = "SELECT * FROM teachers ORDER BY created_at DESC LIMIT 6";
$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch the first row
    // $course = mysqli_fetch_assoc($result);

    if ($result && mysqli_num_rows($result) > 0) {
      
    } else {
        // Handle the case where no course is found
        $noCourse = "No teacher found"; 
    }

    // Rewind the result set pointer
    mysqli_data_seek($result, 0);

    // Fetch all rows
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result); // Free the result set
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}
include('included/header.php');

?>

<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>About Page</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void()" title="" class="active">Explore And Know More About Inmotion ICT
                            Hub</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End nav -->
<?php
include('included/signUp.php');
?>
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <div class="about_title">
                    <span>About Us</span>
                    <h2>The most skilled ICT Developers are built Inmotion.</h2>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 p-0">
                <div class="banner_about">
                    <img src="images/banner/about_thinking.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row about_content_wrapper">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 p-0">
                <div class="about_banner_down">
                    <img src="images/blog/blog_3.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <div class="about_content">
                    <p>Welcome to InMotion ICT Hub, where we are dedicated to nurturing the next generation of
                        professional programmers and coders. Our comprehensive training programs are designed to
                        equip students with the skills, knowledge, and mindset necessary to thrive in today's
                        dynamic tech industry. At InMotion ICT Hub, we believe in fostering innovation, creativity,
                        and excellence in every individual who walks through our doors.</p>
                    <a title="" class="pointer" onclick="document.getElementById('toggle-switcher').click();">Read
                        More
                        About Us <i class=" fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!--========={ Popular Courses }========-->
<section class="unlimited_possibilities" id="about_unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Unlimited Possibilities</h2>
                    <p>Unleash your potential with InMotion ICT Hub. Explore endless opportunities in programming
                        and coding. Your journey to unlimited possibilities begins here.</p>
                </div><!-- ends: .section-header -->
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_first">
                    <div class="icon_wrapper">
                        <i class="flaticon-student"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Learn anywhere</a></h3>
                        <p>At InMotion ICT Hub, we prioritize flexible education, transcending boundaries, and
                            fostering digital-age lifelong learners for global access.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_center">
                    <div class="icon_wrapper">
                        <i class="flaticon-university"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Our Mission</a></h3>
                        <p>Our mission is to empower aspiring tech professionals with cutting-edge education,
                            fostering innovation and excellence in the ICT industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_last">
                    <div class="icon_wrapper">
                        <i class="flaticon-diploma"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Diploma Course</a></h3>
                        <p>Explore our intensive Diploma Course, designed to equip you with essential skills for a
                            successful career in programming and coding.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_center">
                    <div class="icon_wrapper">
                        <i class="flaticon-atom"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Physical Activity</a></h3>
                        <p>Integrate physical activity into our programs, promoting holistic well-being for students
                            through energizing exercises, enhancing focus, and reducing stress.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_last">
                    <div class="icon_wrapper">
                        <i class="flaticon-open-book"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Book Library</a></h3>
                        <p>Explore our Book Library for a wealth of knowledge, offering essential resources to
                            enrich your learning and development journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_first item_6">
                    <div class="icon_wrapper">
                        <i class="flaticon-care"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="javascript:void()" title="">Love & Care</a></h3>
                        <p>InMotion ICT Hub fosters a culture of love and care, ensuring every student feels
                            supported and loved on their learning journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Popular Courses -->


<section class="video_online">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Watch Online Video</h2>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="video_wrapper">
                    <div class="video_banner">
                        <img src="images/banner/video_mockup.png" alt="">
                        <div class="video_view_btn">
                            <a href="https://www.youtube.com/watch?v=zoQ8C0r6Djw" class="video-iframe"><i
                                    class="flaticon-play-button"></i></a>
                        </div>
                    </div>
                    <div class="shape_video">
                        <img src="images/shapes/video_1.png" alt="" class="shape_1">
                        <img src="images/shapes/video_2.png" alt="" class="shape_2">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 counter_single_wrapper">
                <div class="section count_single">
                    <div class="project-count counter">7096</div>
                    <span>Active students</span>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 counter_single_wrapper">
                <div class="section count_single">
                    <div class="project-count counter">508</div>
                    <span>Online Courses</span>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 counter_single_wrapper">
                <div class="section count_single">
                    <div class="project-count"><span class="counter">100</span><span class="count_icon">%</span>
                    </div>
                    <span>Satisfaction</span>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 counter_single_wrapper">
                <div class="section count_single">
                    <div class="project-count counter">70</div>
                    <span>Fraduates</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_shapes">
    </div>
</section><!-- End ONline Video -->
<!--========={ Our Instructiors }========-->
<section class="our_instructors" id="about_our_instructors">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Meet Our Instructors</h2>
                    <p>Meet our dedicated team of expert instructors, passionate about guiding you through your
                        coding journey. Learn from industry professionals committed to your success only at InMotion
                        ICT
                        Hub.</p>
                </div><!-- ends: .section-header -->
            </div>
            <?php foreach($teachers as $teacher){
                    $userId = $teacher['user_id'];
                    $sql1 = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($con, $sql1);

if ($result) {
       if ($result && mysqli_num_rows($result) > 0) {
      
    } else {
        $noCourse = "No teacher found"; 
    }
    mysqli_data_seek($result, 0);    
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result); 

} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}?> <div class="single-wrappe col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="team-single-item">
                    <figure>
                        <div class="member-img">
                            <div class="teachars_pro">
                                <img src=<?php if($teacher){echo $teacher['Image'];}?> alt="member img"
                                    class="img-fluid" style="min-width: 100%;min-height: 334px;max-height: 334px;">
                            </div>
                        </div>
                        <figcaption>
                            <div class="member-name">
                                <h4><a href="teachersDetails.php?id=<?php echo $teacher['id'];?>"
                                        title=""><?php if($user){echo $user['full_name'];}?></a></h4>
                                <span><?php if($teacher){echo $teacher['programming_language'] . "  Instructor";}?></span>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!-- ./ End Our Instructiors -->


<section class="out_count_student">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Everything Is Inmotion</h2>
                    <p>In our world, everything is InMotion—where ideas evolve, skills flourish, and futures take
                        shape. Embrace the dynamic energy of progress and transformation with InMotion ICT Hub.</p>
                </div><!-- ends: .section-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="counter_wrapper">
                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1200 </span><span
                                    class="count_icon">+</span></div>
                            <span>Active students</span>
                        </div>
                    </div>

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1300 </span><span
                                    class="count_icon">+</span></div>
                            <span>Online Courses</span>
                        </div>
                    </div>

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1050 </span><span
                                    class="count_icon">+</span></div>
                            <span>Satisfaction</span>
                        </div>
                    </div>

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1500 </span><span
                                    class="count_icon">+</span></div>
                            <span>Fraduates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_shapes">

    </div>
</section><!-- End Testimonial -->



<section class="faq_about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Frequently asked Questions</h2>
                    <p>Got questions? Find quick answers here. From enrollment details to program specifics,
                        discover all you need to know about InMotion ICT Hub.</p>
                </div><!-- ends: .section-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="faq_wrapper">
                    <div class="single_faq">
                        <h3><span>1</span>How do I Join Your Bootcamp?</h3>
                        <p>Make the enrollment process clear and straightforward, guiding potential students on the
                            first steps to kickstart their learning journey.</p>
                    </div>
                    <div class="single_faq">
                        <h3><span>2</span>Are lessons interactive?</h3>
                        <p>Highlight the diversity of languages covered, showcasing the comprehensiveness of your
                            programs to appeal to a broad range of learners.</p>
                    </div>
                    <div class="single_faq">
                        <h3><span>3</span>Do I need HTML/CSS skills?</h3>
                        <p>Address a common concern among students, emphasizing your commitment to their success
                            beyond the classroom by providing career-oriented support.</p>
                    </div>
                    <div class="single_faq">
                        <h3><span>4</span>Will there be coding projects?</h3>
                        <p>Assessments at InMotion ICT Hub are diverse, ranging from practical projects to exams.
                            The grading system is transparent, emphasizing performance metrics. We provide clear
                            feedback to aid continuous improvement.</p>
                    </div>
                    <div class="single_faq">
                        <h3><span>5</span>Are there any prerequisites?</h3>
                        <p>Yes, our instructors are highly experienced industry professionals with a wealth of
                            knowledge and expertise to guide students through their learning journey effectively and
                            efficiently.</p>
                    </div>
                    <div class="single_faq">
                        <h3><span>6</span>What is the refund policy?</h3>
                        <p>Clarify your institution's refund policy, providing transparency about financial matters
                            and addressing concerns related to course fees and potential refunds.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="teamgroup">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0">
                <div class="teamgroup_info_wrapper">
                    <h2>Unlock your coding potential now Transform dreams into code reality</h2>
                    <a href="course.php" title="" class="srtarte_btn">Get Started Now</a>
                </div>
                <div class="teamgroup_info_banner">
                    <img src="images/banner/teamgroup.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('included/footer.php');
?>