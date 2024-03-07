<?php
session_start();
include("Database/connection.php");
if(isset($_SESSION) && isset($_SESSION['loginId'])){
    if($_SESSION['role'] !== 'student'){
        // header('Location: index.php');
        $id = $_SESSION["id"];
        if(isset($id)){
            $sql2 = "SELECT * FROM courses WHERE teacher_id = $id";
            $result2 = mysqli_query($con, $sql2);
            $courses = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            if(empty($courses)){
                $noCourse = 'No courses found';
            }
            if($courses){
                $userId = $_SESSION["loginId"];
                $sql1 = "SELECT * FROM users WHERE id = $userId";
                $result1 = mysqli_query($con, $sql1);
                $user = mysqli_fetch_assoc($result1);}
            // var_dump($courses);
            // die();
        }else{
            header('Location: index.php');
        }
    }else{
    header('Location: index.php');
    }
}else{
    header('Location: index.php');
} 
include('included/teachersMessage.php');
include 'included/functions.php';
include('included/teacherProfile.php');

?>

<section class="teachers_profile" style="padding-top: 80px">
    <form action="form_handlers/editProfile.php" id="editProfileForm" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 teacher-detail-left">
                    <div class="teacher_info_wrapper">
                        <div class="teacher-image">
                            <?php if(!empty($_SESSION['image'])){?>
                            <a href="javascript:void(0);" onclick="document.getElementById('image').click();"><img
                                    src=<?php echo $_SESSION['image'];?> id="preview-image" style="min-width: 100%;"
                                    class="img-fluid"></a>
                            <?php }else{?>
                            <a href="javascript:void(0);" onclick="document.getElementById('image').click();"><img
                                    src="images/Screenshot 2024-02-01 083354.png" id="preview-image"
                                    style="min-width: 100%;" class="img-fluid"></a>
                            <?php } ?>
                        </div>
                        <div class="social_wraper d-flex justify-content-between align-items-center">
                            <ul class="social-items d-flex list-unstyled" style="width: 100%;">
                                <div class="icons d-flex">
                                    <li><a href="javascript:void(0);"><i class="fab fa-facebook-f fb-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-twitter twitt-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in link-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-instagram ins-icon"></i></a>
                                    </li>
                                </div>
                                <button type="button" class="btn btn-danger ms-auto" style="margin-left: auto;"
                                    id="logoutButton"><a href="createCourse.php
                            ">Add Course</a> </button>
                            </ul>
                        </div>
                        <div class="teacher-skills">
                            <?php if($_SESSION["department"] == "Frontend-Web Development"){?>
                            <div class="skill-single">
                                <span>HTML - <span class="skills_lavel">80%</span></span>
                                <span><span style="width:80%;"></span></span>
                            </div>
                            <div class="skill-single">
                                <span><?php echo $_SESSION["programming_language"] ?> - <span
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
                            <?php }elseif($_SESSION["department"] == "Backend-Web Development"){?>
                            <div class="skill-single">
                                <span>HTML - <span class="skills_lavel">80%</span></span>
                                <span><span style="width:80%;"></span></span>
                            </div>
                            <div class="skill-single">
                                <span>Wordpress - <span class="skills_lavel">70%</span></span>
                                <span><span style="width:70%;"></span></span>
                            </div>
                            <div class="skill-single">
                                <span><?php echo $_SESSION["programming_language"] ?> - <span
                                        class="skills_lavel">90%</span></span>
                                <span><span style="width:90%;"></span></span>
                            </div>
                            <div class="skill-single">
                                <span>Bootstrap5 - <span class="skills_lavel">75%</span></span>
                                <span><span style="width:75%;"></span></span>
                            </div>
                            <?php }elseif($_SESSION["department"] == "Fullstack-Web Development"){?>
                            <div class="skill-single">
                                <span><?php echo $_SESSION["programming_language"] ?> - <span
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
                            <?php }elseif($_SESSION["department"] == "Mobile App Development"){?>
                            <div class="skill-single">
                                <span><?php echo $_SESSION["programming_language"] ?> - <span
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
                                <span><?php echo $_SESSION["programming_language"] ?> - <span
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
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                        <input type="file" id="image" style="display: none;" name="image"
                                            onchange="previewImage()">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="name" name="name"
                                                value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["name"];} ?>"
                                                class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Department</label>
                                            <select class="form-control" name="department" id="course-type" required>
                                                <option
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["department"];} ?>">
                                                    <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["department"];} ?>
                                                </option>
                                                <option value="Frontend-Web Development">Frontend-Web Development
                                                </option>
                                                <option value="Backend-Web Development">Backend-Web Development
                                                </option>
                                                <option value="Fullstack-Web Development">Fullstack-Web Development
                                                </option>
                                                <option value="Mobile App Development">Mobile App Development
                                                </option>
                                                <option value="User-Experience(UX) Design">User-Experience(UX)
                                                    Design
                                                </option>
                                                <option value="User-Interface(UI) Design">User-Interface(UI) Design
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Experience</label>
                                            <input type="text" name="experience" class="form-control" placeholder=""
                                                value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["experience"];} ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Language</label>
                                            <input type="text" name="spoken_language" class="form-control"
                                                placeholder=""
                                                value="<?php if(isset($_SESSION) && isset($_SESSION['loginId'])){echo $_SESSION["spoken_language"];} ?>"
                                                required>
                                        </div>
                                        <a href="" class="quit" data-toggle="modal" data-target="#quitModal">Quit
                                            Teaching</a>
                                    </div>
                                    <div class=" col-12 col-lg-12 col-md-12 col-lg-12">
                                        <button type="submit" name="submit" class="btn update" id="submitButton"
                                            disabled>Save
                                            Changes</button>
                                    </div>

                                </div>
    </form>
    </div>
    </div>

    <div class="col-sm-6">
        <div class="teacher-contact">
            <h2>Contact Us</h2>
            <form action="#">
                <input type="text" placeholder="Your Name*" value="<?php echo $_SESSION["name"];?>" required>
                <input type="email" placeholder="Email*" value="<?php echo $_SESSION["email"];?>" required>
                <textarea placeholder="I'm having issues uploading a course"></textarea>
                <button type="submit">Submit Your Request</button>
            </form>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="courses_tab_wrapper">
            <div class="courses_details_nav_tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#information" role="tab" data-toggle="tab"><i
                                class="flaticon-info-sign"></i>About Insructor</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#curricularm" role="tab" data-toggle="tab"><i
                                class="flaticon-portfolio"></i>Qualification</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#courses" role="tab" data-toggle="tab"><i
                                class="flaticon-portfolio"></i>Courses</a></li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab_contents tab-content">
                <div role="tabpanel" class="tab-pane fade in active show" id="information">
                    <?php echo $aboutTeacher ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="curricularm">
                    <?php echo $qualified ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="courses">
                    <!-- courses -->
                    <div class="popular_courses">
                        <div class="row">
                            <?php foreach($courses as $course){
                                                    $dropTimestamp = strtotime($course['created_at']); // Replace this with your actual timestamp

                                                    // Calculate the time difference
                                                    $currentTimestamp = time();
                                                    $timeDifference = $currentTimestamp - $dropTimestamp;
                                                    
                                                    // Convert the time difference to a human-readable format
                                                    $elapsedTime = formatElapsedTime($timeDifference);
                                                    ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="single-courses">
                                    <div class="courses_banner_wrapper">
                                        <div class="courses_banner"><a
                                                href="course-details.php?id=<?php echo $course['id'];?>"><img
                                                    src=<?php echo htmlspecialchars($course['image']);?> alt=""
                                                    class="img-fluid" style="min-height:240px; max-height: 240px;"></a>
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
                                                <li><i
                                                        class="fas fa-user"></i><?php echo $course['student_count'] . " Students"?>
                                                </li>
                                                <!-- <li></li> -->
                                            </ul>
                                            <form method="post" action="Form_handlers\deleteCourse.php">
                                                <input type="hidden" name="course_id"
                                                    value="<?php echo $course['id']; ?>">
                                                <button type="submit" style="border: none;" class="cart_btn"
                                                    title="I Want This Course Deleted" name="submit">Delete
                                                    Course</button>
                                            </form>
                                            <!-- <a href="javascript:void()" class="cart_btn">Delete Course</a> -->
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

<!-- Footer -->
<footer class="footer_2">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col footer_intro">
                        <img src="images/king2.png" style="width: 200px; height:auto" alt="" class="f_logo">
                        <p>Elevate your skills with InMotion ICT Hub. Empowering future coders. Unlock
                            opportunities. Join our vibrant community today for a journey of limitless
                            possibilities.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col">
                        <h3>Useful Links</h3>
                        <ul class="location_info quick_inf0">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="blog-details.php">Blog</a></li>
                            <li><a href="about.php">Developers</a></li>
                            <li><a href="courses.php">Services</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col information">
                        <h3>information</h3>
                        <ul class="quick_inf0">
                            <li><a href="about.php">Campus Tour</a></li>
                            <li><a href="contact.php">Student Life</a></li>
                            <li><a href="course.php">Scholarship</a></li>
                            <li><a href="contact.php">Admission</a></li>
                            <li><a href="blog-details.php">Leadership</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col contact">
                        <h3>Contact Us</h3>
                        <p>Feel free to get in touch us via Phone or send us a message.</p>
                        <div class="contact_info">
                            <span>+234 913 265</span>
                            <span class="email">inmotion@ictHub.com</span>
                        </div>
                        <ul class="social_items d-flex list-unstyled">
                            <li><a href="javascript:void(0);"><i class="fab fa-facebook-f fb-icon"></i></a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="fab fa-twitter twitt-icon"></i></a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in link-icon"></i></a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="fab fa-instagram ins-icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        <a target="_blank" href="https://www.inmotionhub.com/contact/">Inmotion Hub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shapes_bg">
        <img src="images/shapes/testimonial_2_shpe_1.png" alt="" class="shape_3">
        <img src="images/shapes/footer_2.png" alt="" class="shape_1">
    </div>
</footer><!-- End Footer -->

<section id="scroll-top" class="scroll-top">
    <h2 class="disabled">Scroll to top</h2>
    <div class="to-top pos-rtive">
        <a href="#"><i class="flaticon-right-arrow"></i></a>
    </div>
</section>
<script>
function previewImage() {
    var previewContainer = document.getElementById("image-preview-container");
    var previewImage = document.getElementById("preview-image");
    var fileInput = document.getElementById("image");

    var file = fileInput.files[0];

    if (file) {
        // Check if the file type is an image
        if (file.type.startsWith('image/')) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Create an Image object to get the original dimensions
                var img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                    // Set the maximum width and height for the image
                    var maxWidth = 130; // Specify your desired maximum width
                    var maxHeight = 165; // Specify your desired maximum height

                    // Calculate the aspect ratio to maintain proportions
                    var aspectRatio = img.width / img.height;

                    // Calculate new dimensions while maintaining aspect ratio
                    var newWidth = Math.min(maxWidth, img.width);
                    var newHeight = Math.min(maxHeight, newWidth / aspectRatio);

                    // Set the dimensions for the preview image
                    previewImage.width = newWidth;
                    previewImage.height = newHeight;

                    // Set the source and display the image
                    previewImage.src = e.target.result;
                    previewContainer.style.display = "block";
                };
            };

            reader.readAsDataURL(file);
        } else {
            // File is not an image, handle accordingly
            alert("Please choose an image file.");
            fileInput.value = ''; // Clear the file input
            // previewContainer.style.display = "none";
        }
    } else {
        // previewContainer.style.display = "none";
    }
}
</script>
<?php
      if(isset($_SESSION['nameError']) || isset($_SESSION['emailError']) || isset($_SESSION['passwordError'])){
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#errorMessage').text('{$_SESSION['nameError']}');
                $('#errorMessage2').text('{$_SESSION['emailError']}');
                $('#errorMessage3').text('{$_SESSION['passwordError']}');  
                $('#successMessage').text('{$_SESSION['success']}');  
                $('#errorModalLabel').text('{$_SESSION['message']}');           
                $('#errorModal').modal('show');
            });
          </script>";}
          unset($_SESSION['nameError']);
          unset($_SESSION['emailError']);
          unset($_SESSION['passwordError']);
          ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
function quitTeaching() {
    // Perform actions when the user chooses to quit teaching
    alert("You have quit teaching."); // You can replace this with your desired action
    // You might want to redirect the user to a different page or perform other actions here
}
</script>
<script>
// Store the initial form values
var initialFormValues = {};

// Function to check if any form value has changed
function checkFormChanges() {
    var formChanged = false;
    $('input[name], select[name]').each(function() {
        if ($(this).val() !== initialFormValues[$(this).attr('name')]) {
            formChanged = true;
            return false; // Exit the loop if any change is detected
        }
    });

    // Enable/disable the submit button based on form changes
    $('#submitButton').prop('disabled', !formChanged);
}

// Store the initial form values when the page loads
$(document).ready(function() {
    $('input[name], select[name]').each(function() {
        initialFormValues[$(this).attr('name')] = $(this).val();
    });

    // Check for changes on input and select
    $('input[name], select[name]').on('input change', checkFormChanges);
});
</script>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            <a class="navbar-brand" href="index.php"><img src="images/king.png" style="width: 200px;" alt="logo"></a>
            <p>A Guide for InMotion ICT Hub Educators</p>

        </div>
        <div class="demos">
            <h4 style="color:#ff5a2c">Vision Statement:</h4>
            <p>"Welcome to InMotion ICT Hub, where the seeds of technological prowess are sown and cultivated into
                future leaders of the digital realm. As educators at our esteemed institution, your role is pivotal
                in shaping the minds and skills of aspiring programmers and coders. In this comprehensive guide, we
                delve into the key principles and strategies that will empower you to not only teach but also
                inspire and guide our students on their journey towards becoming professional programmers.</p>

            <h4 style="color:#ff5a2c">Understanding Your Students:</h4>
            <p>"At InMotion ICT Hub, we recognize the uniqueness of each student. Tailoring your teaching approach
                to cater to different learning styles is crucial. Some students may grasp concepts through hands-on
                coding, while others may thrive in collaborative environments. By understanding the individual
                strengths and preferences of your students, you can create a dynamic and inclusive learning
                environment."
            </p>
            <h4 style="color:#ff5a2c">Fostering a Growth Mindset:</h4>
            <p> <b style="color:#ff5a2c"> 1.</b>Building a Supportive Classroom Culture
                In the vibrant ecosystem of InMotion ICT Hub, the classroom is not just a space for learning but a
                community where collaboration and support thrive. Foster a positive and inclusive culture where
                students feel comfortable expressing their ideas, seeking help, and working together. Emphasize the
                value of teamwork and the collective journey towards mastering programming languages and coding
                paradigms.</p>
            <p><b style="color:#ff5a2c"> 2.</b> Real-world Application of Concepts
                Connect theoretical knowledge to real-world applications. Showcasing how programming concepts are
                used in industry scenarios adds relevance and excitement to the learning process. Incorporate case
                studies, industry projects, and guest lectures from experienced professionals to bridge the gap
                between academia and the professional world.</p>
            <p><b style="color:#ff5a2c"> 3.</b> Inclusive Learning Environment
                Objective: Foster an inclusive and diverse learning environment that supports students from all
                backgrounds.
                Key Results:
                Increase the enrollment of underrepresented groups by 20% annually.
                Implement mentorship programs to provide guidance and support to all students.</p>
            <p><b style="color:#ff5a2c"> 4.</b> Hands-on Learning and Practical Exercises
                Engage students through hands-on coding exercises and practical projects. Active participation
                enhances understanding and retention. Encourage experimentation and exploration, allowing students
                to apply theoretical concepts in a practical setting. This approach not only reinforces learning but
                also fosters creativity and problem-solving skills.</p>
            <p><b style="color:#ff5a2c"> 5.</b> Adapting to Technological Advances
                In the rapidly evolving field of technology, staying abreast of the latest trends and tools is
                imperative. Integrate emerging technologies and coding languages into your curriculum, ensuring that
                students are equipped with the most relevant and up-to-date skills. This commitment to staying
                current positions our students for success in a dynamic and competitive industry.
            </p>
            <p> <b style="color:#ff5a2c"> 6.</b> Effective Communication and Feedback
                Clear and concise communication is the cornerstone of effective teaching. Provide detailed
                explanations, use relatable examples, and encourage questions. Additionally, constructive feedback
                is a powerful tool for student improvement. Be specific in your feedback, highlighting both
                strengths and areas for growth. This approach instills confidence and helps students refine their
                skills.</p>
            <p><b style="color:#ff5a2c"> 7.</b>Encouraging Self-directed Learning
                Empower students to take control of their learning journey. Encourage them to explore additional
                resources, participate in coding competitions, and contribute to open-source projects. Fostering a
                sense of autonomy instills a lifelong love for learning and prepares students for the self-directed
                nature of the tech industry.</p>
            <h4 style="color:#ff5a2c">Conclusion:</h4>
            <p> As educators at InMotion ICT Hub, your own professional development is paramount. Stay engaged in
                continuous learning, attend workshops, and collaborate with colleagues to exchange best practices.
                By staying at the forefront of educational methodologies and technological advancements, you enhance
                your ability to guide students effectively.

                In closing, at InMotion ICT Hub, we believe in the transformative power of education. As educators,
                you play a pivotal role in shaping the future of our students. By embracing these guiding
                principles, you contribute not only to their academic success but also to the development of
                well-rounded, confident, and industry-ready individuals. Thank you for your dedication to nurturing
                the next generation of tech maestros at InMotion ICT Hub. Together, we pave the way for a future
                defined by innovation, creativity, and excellence in the ever-evolving landscape of information and
                communication technology.</p>

            <b style="color:#ff5a2c"> Embark on a journey with us at InMotion ICT Hub, where the intersection of
                education and innovation sets the stage for shaping the future of coding. Together, let's script the
                narrative of tomorrow!
            </b>
        </div>
    </div>
</div>
</body>