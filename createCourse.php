<?php
session_start();
include("Database/connection.php");

if(isset($_SESSION) && isset($_SESSION['loginId'])){
    if($_SESSION['role'] !== 'student'){
       
    }else{
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousPage = $_SERVER['HTTP_REFERER'];
            // Use $previousPage as needed
            $_SESSION['message'] = "Error Message";
            $_SESSION['emailError'] = "Only Inmotion Hub Instructors are allowed to access this page";
            $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
            header("Location: $previousPage");
        } else {
            // Handle the case where the HTTP referer is not set
            $_SESSION['message'] = "Error Message";
            $_SESSION['emailError'] = "Only Inmotion Hub Instructors are allowed to access this page";
            $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
            header('Location: index.php');
        }
    } 
}else{
    header('Location: index.php');
} 

include('included/header.php');
?>
<section class="register_area" style="padding: 30px">
    <section class="forgot_pass" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-7 col-lg-7 mx-auto">
                    <div class="forgot_wrapper">
                        <h6>Pioneer knowledge on our <span
                                style="color:#ff5a2c; cursor: pointer; font-weight:700">Create
                                Course page</span>.
                            Tailor engaging lessons,
                            inspire curiosity, and mold future tech leaders. Join us!</h6>
                        <form action="Form_handlers\courseHandlers.php" method="post" enctype="multipart/form-data">
                            <!-- course name form -->
                            <div class="form-group">
                                <div class="mt-4 mb-4" id="imagePreview" style="height: auto; min-width: 100%;">
                                </div>
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Write Your Course Title" name="courseName" type="text"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['courseName'])){echo $_SESSION['courseName'];} ?>"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset( $_SESSION['courseNameError'])){echo $_SESSION['courseNameError'];} ?></span>
                            </div>
                            <!-- course Duration form -->
                            <div class="form-group">
                                <input autocomplete="off" class="required form-control" name="courseDuration"
                                    placeholder="Write Course Duration-190 days" type="text" name="courseDuration"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['courseDuration'])){echo $_SESSION['courseDuration'];} ?>"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset( $_SESSION['courseDurationError'])){echo $_SESSION['courseDurationError'];} ?></span>
                            </div>
                            <!-- course Image form -->
                            <div class="form-group">
                                <input autocomplete="off" class="form-control" name="courseImage"
                                    placeholder="Choose Course Image/Thumbnail" required="" type="text"
                                    onclick="document.getElementById('imageUpload').click()" required>
                            </div>
                            <!-- course price form -->
                            <div class="form-group">
                                <input class="form-control" name="coursePrice" id="coursePrice"
                                    placeholder="Price in Dollars-$20.00" required="" type="text" disabled>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['coursePriceError'])){echo $_SESSION['coursePriceError'];}?></span>
                            </div>
                            <!-- course Type form -->
                            <div class="form-group">
                                <select class="form-control" name="courseType" id="courseTypeSelect" required>
                                    <option value="free">This Course Is Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                            <div class="form-group" style="display: none;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imageUpload" name="imageUpload"
                                        accept="image/*" onchange="previewImage(this)">
                                    <label class="custom-file-label" for="imageUpload">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="courseDescription">Course Description:</label> -->
                                <textarea class="form-control" name="courseDescription"
                                    placeholder="Write Something Here"
                                    required><?php if(isset($_SESSION) && isset($_SESSION['courseDescription'])){echo $_SESSION['courseDescription'];} ?></textarea>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['courseDescription'])){echo $_SESSION['courseDescriptionError'];} ?></span>
                            </div>
                            <div class="form-group register-btn">
                                <button type="submit" class="btn btn-primary reset_pass_btn" value="Reset Password"
                                    name="submit">Upload Course</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- ./ End section -->

</section><!-- ./ End Register Area section -->

</div>
</section>

<?php
include('included/footer.php');
?>