<?php
session_start();
include("Database/connection.php");

if(isset($_SESSION) && isset($_SESSION['loginId'])){
    if($_SESSION['role'] !== 'student'){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
} 
include('included/teach.php');

?>


<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Become A Teacher</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="#" title="" class="active">Become a teacher</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End header -->

<section class="become_a_instructor">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8">
                <div class="video_img wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s">
                    <img src="images/banner/instructor.jpg" alt="" class="img-fluid">
                    <div class="video_wrapper  wow fadeIn" data-wow-duration="2s" data-wow-delay=".5s">
                        <div class="video-play-btn">
                            <span><a href="https://www.youtube.com/watch?v=s3qN4Ea2xVU" class="video-iframe"><i
                                        class="fa fa-play"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
                <div class="apply_instructor">
                    <div class="form_title">
                        <h3>Fill This Form To Apply</h3>
                    </div>
                    <form action="form_handlers/becomeATeacherHandler.php" method="post" enctype="multipart/form-data">



                        <div class="row">
                            <div class="col-6 col-lg-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="+234-9132-667-481"
                                        required>
                                    <!-- <span>+234-9132-667-481</span><br> -->
                                </div>
                                <input type="file" id="image" style="display: none" name="image"
                                    onchange="previewImage()">
                                <div class="form-group">
                                    <label class="control-label">Experience</label>
                                    <select class="form-control" name="experience" id="course-type" required>
                                        <option value=""></option>
                                        <option value="Two Years">Over Two Years</option>
                                        <option value="Three Years">Over Three Years</option>
                                        <option value="Four Years">Over Four Years</option>
                                        <option value="Five Years">Over Five Years</option>
                                        <option value="Six Year">Over Six Years</option>
                                        <option value="Seven Years">Over Seven Years</option>
                                        <option value="Eight Years">Over Eight Years</option>
                                        <option value="Nine Years">Over Nine Years</option>
                                        <option value="Over A Decade">Over A Decade</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-6 col-lg-6 col-md-6 col-lg-6 overall" id="image-preview-container">
                                <a href="javascript:void(0);" onclick="
                                    document.getElementById('image').click(); 
                                    "><img src="images/user.png" id="preview-image" class="round"
                                        alt="Profile pics"></a>
                                <!-- <div class="image"></div> -->
                            </div>
                            <div>


                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                        <select class="form-control" name="department" id="course-type" required>
                                            <option value=""></option>
                                            <option value="Frontend-Web Development">Frontend-Web Development
                                            </option>
                                            <option value="Backend-Web Development">Backend-Web Development</option>
                                            <option value="Fullstack-Web Development">Fullstack-Web Development
                                            </option>
                                            <option value="User-Experience(UX) Design">User-Experience(UX) Design
                                            </option>
                                            <option value="User-Interface(UI) Design">User-Interface(UI) Design
                                            </option>
                                            <option value="Mobile App Development">Mobile App Development</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Most proficient language</label>
                                        <select class="form-control" name="pLanguage" id="course-type" required>
                                            <option value=""></option>
                                            <option value="HTML/CSS">HTML/CSS</option>
                                            <option value="Axure RP">Axure RP</option>
                                            <option value="JavaScript">JavaScript</option>
                                            <option value="Python">Python</option>
                                            <option value="Java">Java</option>
                                            <option value="C#">C#</option>
                                            <option value="C++">C++</option>
                                            <option value="TypeScript">TypeScript</option>
                                            <option value="PHP">PHP</option>
                                            <option value="Swift">Swift</option>
                                            <option value="Flutter (Dart)">Flutter(Dart) </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Primary Spoken Language</label>
                                        <select class="form-control" name="sLanguage" id="course-type" required>
                                            <option value=""></option>
                                            <option value="English">English</option>
                                            <option value="Mandarin Chinese">Mandarin Chinese</option>
                                            <option value="Java">Spanish</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Indonesian">Indonesian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-default submit_btn">Send</button>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Become A Instructor -->
<!-- Footer -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 p-0 ">
                <div class="shape_wrapper">
                    <img src="images/shapes/bubble_shpe_1.png" alt="" class="shape_t_1">
                    <img src="images/shapes/round_shpae_1.png" alt="" class="shape_t_2">
                </div>
            </div>
            <div class="col-12 col-sm-9 col-md-9 col-lg-9 p-0 become_techer_wrapper">
                <div class="become_a_teacher">
                    <div class="title">
                        <h2>Become An Instructor</h2>
                        <p>Join our mission! Inspire the next generation of coders. Explore the rewarding path of
                            becoming an InMotion Instructor. Make an impact today.</p>
                    </div><!-- ends: .section-header -->
                    <div class="get_s_btn pointer">
                        <a title="" onclick="document.getElementById('toggle-switcher').click();">Get
                            Started Now</a>
                    </div>
                    <img src="images/shapes/bubble_shpe_2.png" alt="" class="shape_t_1">
                </div>
            </div>
        </div>
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
                            <li><a href="https://inmotionhub.com/" target="_blank"><i
                                        class="fab fa-facebook-f fb-icon"></i></a>
                            </li>
                            <li><a href="https://inmotionhub.com/" target="_blank"><i
                                        class="fab fa-twitter twitt-icon"></i></a>
                            </li>
                            <li><a href="https://inmotionhub.com/" target="_blank"><i
                                        class="fab fa-linkedin-in link-icon"></i></a>
                            </li>
                            <li><a href="https://inmotionhub.com/" target="_blank"><i
                                        class="fab fa-instagram ins-icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="round_shape">
        <span class="shape_1"></span>
        <span class="shape_2"></span>
        <span class="shape_3"></span>
        <span class="shape_4"></span>
        <span class="shape_5"></span>
        <span class="shape_6"></span>
    </div>
    <img src="images/shapes/footer_bg_shpe_1.png" alt="" class="shapes1_footer">
</footer><!-- End Footer -->

<section id="scroll-top" class="scroll-top">
    <h2 class="disabled">Scroll to top</h2>
    <div class="to-top pos-rtive">
        <a href="#"><i class="flaticon-right-arrow"></i></a>
    </div>
</section>
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
            <a class="navbar-brand" href="index.php"><img src="images/king.png" style="width: 200px;" alt="logo"></a>
            <p>A Guide for InMotion ICT Hub Educators</p>

        </div>
        <div class="demos">
            <h4 style="color:#ff5a2c">Teacher's Orientation</h4>
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


</html>