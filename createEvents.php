<?php
session_start();
include("Database/connection.php");

if(isset($_SESSION) && isset($_SESSION['loginId'])){
    if($_SESSION['role'] !== 'student' && $_SESSION["email"] == 'victor@gmail.com'){
       
    }else{
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousPage = $_SERVER['HTTP_REFERER'];
            // Use $previousPage as needed
            $_SESSION['message'] = "Error Message";
            $_SESSION['emailError'] = "Only Inmotion Hub Admin Can Create Events ";
            $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
            header("Location: $previousPage");
        } else {
            $_SESSION['message'] = "Error Message";
            // $_SESSION['action'] = "";
            $_SESSION['emailError'] = "Only Inmotion Hub Admin Can Create Events ";
            $_SESSION['nameError'] = "";
        $_SESSION['passwordError']  = "";
        $_SESSION['success'] = "";
            // Handle the case where the HTTP referer is not set
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
                        <h6>Explore exciting<span style="color:#ff5a2c; cursor: pointer; font-weight:700">
                                Events!</span>.
                            From workshops to conferences, our calendar is packed. Join us for learning,
                            networking, and unforgettable experiences.</h6>
                        <form action="Form_handlers\eventHandlers.php" method="post" enctype="multipart/form-data">
                            <!-- course name form -->
                            <div class="form-group">
                                <div class="mt-4 mb-4" id="imagePreview" style="height: auto; min-width: 100%;">
                                </div>
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Write Your Event Title" type="text" name="eventName"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['eventName'])){echo $_SESSION['eventName'];} ?>"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset( $_SESSION['eventNameError'])){echo $_SESSION['eventNameError'];} ?></span>
                            </div>
                            <!-- course Duration form -->
                            <div class="form-group">
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Date - 25 September 2019" type="text" name="eventDate"
                                    value="<?php if(isset($_SESSION) && isset( $_SESSION['eventDate'])){echo  $_SESSION['eventDate'];} ?>"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['eventDateError'])){echo $_SESSION['eventDateError'];} ?></span>
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" class="required form-control"
                                    placeholder="Time - Friday 3:00pm to 5:00pm" type="text" name="eventTime"
                                    value="<?php if(isset($_SESSION) && isset($_SESSION['eventTime'])){echo $_SESSION['eventTime'];} ?>"
                                    required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['eventTimeError'])){echo $_SESSION['eventTimeError'];} ?></span>

                            </div>
                            <!-- course Image form -->
                            <div class="form-group">
                                <input autocomplete="off" class="form-control"
                                    placeholder="Choose Event Image/Thumbnail" required="" type="text"
                                    onclick="document.getElementById('imageUpload').click()" name="eventImage" required>
                            </div>
                            <!-- course price form -->
                            <div class="form-group">
                                <input class="form-control" id="coursePrice" placeholder="Price in Dollars-$20.00"
                                    required="" type="text" name="eventPrice" disabled>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['eventPriceError'])){echo $_SESSION['eventPriceError'];}?></span>
                            </div>
                            <!-- course Type form -->
                            <div class="form-group">
                                <select class="form-control" id="courseTypeSelect" name="eventPricePlan" required>
                                    <option value="free">This Event Is Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="courseTypeSelect" name="eventType" required>
                                    <option value="Tech Conference">Tech Conference</option>
                                    <option value="InMotion DevCon:">InMotion DevCon</option>
                                    <option value="Coding Workshop">Coding Workshop</option>
                                    <option value="Digital Webinar">Digital Webinar</option>
                                    <option value="Networking Mixer">Networking Mixer</option>
                                    <option value="Startup Expo">Startup Expo</option>
                                </select>
                            </div>
                            <div class="form-group" style="display: none;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imageUpload" name="eventImage"
                                        accept="image/*" onchange="previewImage(this)">
                                    <label class="custom-file-label" for="imageUpload">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="courseDescription">Course Description:</label> -->
                                <textarea class="form-control" name="eventDescription" placeholder="Describe Event Here"
                                    required><?php if(isset($_SESSION) && isset($_SESSION['eventDescription'])){echo $_SESSION['eventDescription'];} ?></textarea>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION) && isset($_SESSION['eventDescriptionError'])){echo $_SESSION['eventDescriptionError'];} ?></span>
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
</section><!-- ./ End Register Area section -->
<!-- Footer -->
<?php
include('included/footer.php');
?>