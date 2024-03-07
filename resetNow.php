<?php
session_start();
include("Database/connection.php");
if(isset($_GET['unique'])){
$userID = $_GET['unique'];
$query = "SELECT * FROM users WHERE uniqId = '$userID' AND uniqIdTimestamp > '" . date("Y-m-d H:i:s", strtotime("now")) . "'";
$result = mysqli_query($con, $query);
if($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row){
        $_SESSION["email"] = $row["email"];
    }
}else{
    $_SESSION['message'] = "Error Message";
    $_SESSION['action'] = " Recheck Mail-box";
    $_SESSION['nameError'] = "";
    $_SESSION['passwordError']  = "";
    $_SESSION['success'] = "";
    $_SESSION['emailError'] = "Invalid or Expired Token";
    header("Location: index.php");
}}
?>
<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Ecology Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmotion - For Future Devs</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/assets/owl.theme.css">
    <link rel="stylesheet" href="css/assets/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="css/assets/slick.css">
    <!-- Mean Menu-->
    <link rel="stylesheet" href="css/assets/meanmenu.css">
    <!-- main style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/demo.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- forgot pass section -->
    <section class="forgot_pass" style="padding: 50px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-sm-7 col-md-7 col-lg-7 mx-auto">
                    <div class="forgot_wrapper" style="box-shadow: 0px 3px 15px black;">
                        <h6>Secure your account with a strong password. Create a password that is unique and easy for
                            you to remember
                            but difficult for others to guess.</h6>
                        <form method="post" action="Form_handlers\resetNowHandler.php">
                            <div class="form-group">
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Create A New Password" name="password" type="password" required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION['passwordError'])){echo $_SESSION['passwordError'];}?></span>
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Confirm Your New Password" name="confirmPassword" type="password"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION['passwordConfirmError'])){echo $_SESSION['passwordConfirmError'];}?></span>
                            </div>
                            <div class="form-group register-btn">
                                <button type="submit" name="submit" class="btn btn-primary reset_pass_btn"
                                    id="Reset Password">Reset
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ End section -->

    <section id="scroll-top" class="scroll-top">
        <h2 class="disabled">Scroll to top</h2>
        <div class="to-top pos-rtive">
            <a href="#"><i class="flaticon-right-arrow"></i></a>
        </div>
    </section>
    <!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Counter Script -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- =========================================================
         STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
    ============================================================== -->
    <script type="text/javascript" src="js/demo.js"></script>
    <div class="demo-style-switch" id="switch-style">
        <a id="toggle-switcher" class="switch-button" title="Change Styles"><span class="fa fa-cog fa-spin"></span></a>
        <div class="switched-options">
            <div class="config-title">
                <a class="navbar-brand" href="index.php"><img src="images/king.png" style="width: 200px;"
                        alt="logo"></a>
                <p>Goals and Objective</p>

            </div>
            <div class="demos">
                <h4 style="color:#ff5a2c">Vision Statement:</h4>
                <p>"At InMotion ICT Hub, we envision a world where every individual has the opportunity and skills to
                    thrive in the digital era. Our mission is to empower students to become proficient programmers and
                    coders, fostering innovation and driving positive change in the global technology landscape."</p>

                <h4 style="color:#ff5a2c">Mission Statement:</h4>
                <p>"We are dedicated to providing high-quality, industry-relevant training programs that equip students
                    with the knowledge, skills, and confidence to excel as professional programmers. Through a dynamic
                    and
                    supportive learning environment, we aim to bridge the gap between education and industry needs,
                    shaping
                    the next generation of tech leaders."
                </p>
                <h4 style="color:#ff5a2c">Goals:</h4>
                <p> <b style="color:#ff5a2c"> 1.</b> Empowerment Through Education
                    Objective: To empower individuals with the knowledge and skills needed for a successful career in
                    programming and coding.
                    Key Results:
                    Achieve a 90% student satisfaction rate in course content and delivery.
                    Maintain an 80% or higher placement rate for graduates in relevant industries.</p>
                <p><b style="color:#ff5a2c"> 2.</b> Industry-Relevant Curriculum
                    Objective: To develop and continually update a curriculum that aligns with current industry trends
                    and
                    demands.
                    Key Results:
                    Integrate emerging technologies into the curriculum based on industry feedback.
                    Regularly review and update course content to ensure relevance.</p>
                <p><b style="color:#ff5a2c"> 3.</b> Inclusive Learning Environment
                    Objective: Foster an inclusive and diverse learning environment that supports students from all
                    backgrounds.
                    Key Results:
                    Increase the enrollment of underrepresented groups by 20% annually.
                    Implement mentorship programs to provide guidance and support to all students.</p>
                <p><b style="color:#ff5a2c"> 4.</b> Cutting-Edge Facilities and Resources
                    Objective: Provide state-of-the-art facilities and resources to enhance the learning experience.
                    Key Results:
                    Invest in the latest technologies and tools for hands-on training.
                    Create collaborative spaces for students to work on real-world projects.</p>
                <p><b style="color:#ff5a2c"> 5.</b> Continuous Improvement
                    Objective: Continuously assess and enhance the effectiveness of our training programs.
                    Key Results:
                    Implement regular feedback mechanisms for both students and instructors.
                    Use feedback data to make continuous improvements to course materials and teaching methodologies.
                </p>
                <p> <b style="color:#ff5a2c"> 6.</b> Industry Partnerships
                    Objective: Forge strong partnerships with industry leaders to enhance student opportunities.
                    Key Results:
                    Establish collaborations with at least three prominent tech companies annually.
                    Facilitate internships, guest lectures, and networking events with industry professionals.</p>
                <p><b style="color:#ff5a2c"> 7.</b> Global Impact
                    Objective: Extend our reach globally and make a positive impact on a larger scale.
                    Key Results:
                    Develop online courses to cater to a wider audience.
                    Collaborate with international organizations to promote tech education globally.</p>
                <h4 style="color:#ff5a2c">Conclusion:</h4>
                <p> InMotion ICT Hub is committed to shaping the future of tech professionals by providing top-notch
                    education, fostering inclusivity, and staying at the forefront of technological advancements. Our
                    goals
                    and objectives reflect our dedication to excellence, innovation, and the success of our students in
                    the
                    dynamic field of programming and coding.</p>

                <b style="color:#ff5a2c"> Join us at InMotion ICT Hub, where education meets innovation,
                    and together,
                    we'll code the future!
                </b>
            </div>
        </div>
    </div>
</body>


</html>