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
                    <div class="get_s_btn">
                        <a href="javascript:void(0);" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){?>
                            style="display: none;" <?php } ?> class="nav-link apply_btn sign-in js-modal-show"
                            title="">Get
                            Started Now</a>

                        <a href=<?php if(isset($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] !== 'student'){
                              echo "teacher-profile.php";
                                 }else{
                           echo "become-a-teacher.php";};if(isset($_SESSION) && isset($_SESSION['loginId'])){?>
                            <?php }else{ ?> style="display: none;" <?php } ?> title="">Get
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
                            <li><a href="event.php">Events</a></li>
                            <li><a href="team.php">Developers</a></li>
                            <li><a href="courses.php">Services</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col information">
                        <h3>information</h3>
                        <ul class="quick_inf0">
                            <li><a href="contact.php">Bootcamp Tour</a></li>
                            <li><a href="index.php">Student Life</a></li>
                            <li><a href="contact.php">Scholarship</a></li>
                            <li><a href="contact.php">Admission</a></li>
                            <li><a href="team.php">Leadership</a></li>
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
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        <a target="_blank" href="https://www.inmotionhub.com/contact/">Inmotion Hub</a>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
// Add event listener for select change
$('#courseTypeSelect').change(function() {
    if ($(this).val() === 'paid') {
        $('#coursePrice').prop('disabled', false).show();
    } else {
        $('#coursePrice').prop('disabled', true).hide();
    }
});

// Trigger the change event on page load to set initial state
$('#courseTypeSelect').change();
</script>
<script>
function previewImage(input) {
    var preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            image.className = 'img-fluid rounded';
            image.style.minWidth = '100%';
            image.style.maxHeight = '300px';
            image.style.minHeight = '300px';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);

        // After previewing image, update the file name
        updateFileName(input);
    }
}

function updateFileName(input) {
    var fileName = input.files[0].name;
    document.getElementsByName("courseImage")[0].value = fileName;
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
<script>
document.getElementById('scrollButton').addEventListener('click', function() {
    // Get the current vertical scroll position
    const currentPosition = window.scrollY;

    // Calculate the target scroll position (50 pixels down)
    const targetPosition = currentPosition + 3480;

    // Scroll to the target position smoothly
    window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
    });
});
</script>
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
<script>
// Attach a click event to the buy buttons
$(document).on("click", ".buy-button", function() {
    // Assuming the user is redirected to the course page after clicking the Buy button
    // No need for an AJAX request here as the PHP script handles the purchase
    // If needed, you can enhance this to use AJAX for a smoother experience
});
</script>
<script>
// Update the time every minute
setInterval(function() {
    var dropTimestamp = <?php echo $dropTimestamp; ?>;
    var currentTimestamp = Math.floor(Date.now() / 1000);
    var timeDifference = currentTimestamp - dropTimestamp;
    var elapsed = formatElapsedTime(timeDifference);
    $('#dropTime').text('Teacher dropped the course ' + elapsed);
}, 60000); // Update every minute (60,000 milliseconds)
</script>
<script>
// Add event listener for select change
$('#courseTypeSelect').change(function() {
    if ($(this).val() === 'paid') {
        $('#coursePrice').prop('disabled', false).show();
    } else {
        $('#coursePrice').prop('disabled', true).hide();
    }
});

// Trigger the change event on page load to set initial state
$('#courseTypeSelect').change();
</script>
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
<script>
function previewImage(input) {
    var preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            image.className = 'img-fluid rounded';
            image.style.minWidth = '100%';
            image.style.maxHeight = '300px';
            image.style.minHeight = '300px';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);

        // After previewing image, update the file name
        updateFileName(input);
    }
}

function updateFileName(input) {
    var fileName = input.files[0].name;
    document.getElementsByName("eventImage")[0].value = fileName;
}

function updateFileName(input) {
    var fileName = input.files[0].name;
    document.getElementsByName("courseImage")[0].value = fileName;
}
</script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Revolution Slider -->
<script src="js/assets/revolution/jquery.themepunch.revolution.min.js"></script>
<script src="js/assets/revolution/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.meanmenu.min.js"></script>
<!-- Counter Script -->
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/wow.min.js"></script>
<!-- Revolution Extensions -->
<script src="js/assets/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="js/assets/revolution/extensions/revolution.extension.video.min.js"></script>
<script src="js/assets/revolution/revolution.js"></script>
<script src="js/custom.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- =========================================================
         STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
    ============================================================== -->
<script type="text/javascript" src="js/demo.js"></script>
<div class="demo-style-switch" id="switch-style">
    <a id="toggle-switcher" class="switch-button" title="Change Styles"><span class="fa fa-cog fa-spin"></span></a>
    <div class="switched-options">
        <div class="config-title">
            <a class="navbar-brand" href="index.php"><img src="images/king.png" style="width: 200px;" alt="logo"></a>
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