<?php
session_start();
include("Database/connection.php");
include('included/header.php');
?>


<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Contact Page</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void()" title="" class="active">Contact Us Below To Be A
                            Part Of Our Coding Bootcamp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header> <!-- End Header -->
<?php include('included/signUp.php') ?>
<section class="contact_info_wrapper" style="padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="contact_info">
                    <h3 class="title">Contact Details</h3>
                    <p>Contact us for collaboration and inquiries. Your input fuels our growth as we collectively
                        shape the future of tech education.</p>
                    <div class="event_location_info" style="padding-top: 10px">
                        <ul class="list-unstyled">
                            <li>
                                <h4 class="info_title">Address : </h4>
                                <ul class="list-unstyled">
                                    <li> KM 46 East West Road, Beside Cima Petrol Station, Nkpolu-Rumuigbo, Port
                                        Harcourt.</li>
                                    <!-- <li>Spartanburg, SC 29301</li> -->
                                </ul>
                            </li>
                            <li>
                                <h4 class="info_title">Phone Numbers :</h4>
                                <ul class="list-unstyled">
                                    <li>+234 9060400096</li>
                                    <!-- <li>+234 9010217779</li> -->
                                </ul>
                            </li>
                            <li>
                                <h4 class="info_title">Our E-mails :</h4>
                                <ul class="list-unstyled">
                                    <li>hello@inmotionhub.com</li>
                                </ul>
                            </li>
                            <li>
                                <h4 class="info_title">Work Hours:</h4>
                                <ul class="list-unstyled">
                                    <li>Monday to Friday from 9.00 am to 5.00 pm GMT +1
                                        Saturday from 10.00 am to 5.00 pm GMT +1</li>
                                    <!-- <li>+234 9010217779</li> -->
                                </ul>
                            </li>
                        </ul>
                        <img src="images/banner/map_shape.png" alt="" class="contact__info_shpae">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="contact_form_wrapper">
                    <h3 class="title">Get In Touch</h3>
                    <div class="leave_comment">
                        <div class="contact_form">
                            <form action="Form_handlers\contactHandler.php" method="post">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name"
                                            value="<?php if(isset($_SESSION) && isset($_SESSION['name'])){ echo $_SESSION['name'];}?>"
                                            required>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 form-group">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your E-mail"
                                            value="<?php if(isset($_SESSION) && isset($_SESSION['email'])){ echo $_SESSION['email'];}?>"
                                            required>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 form-group">
                                        <input type="tel" name="phone" class="form-control" id="email"
                                            placeholder="Your Phone Number" required>
                                    </div>
                                    <!-- <input type="text" class="form-control" id="subject"
                                            placeholder="Pick Your Subject"> -->
                                    <!-- <label class="control-label">Department</label> -->
                                    <div class="col-12 col-sm-12 col-md-12 form-group">
                                        <select class="form-control" name="category" id="subject"
                                            placeholder="Pick Your Subject" required>
                                            <!-- <option value="" style="color:#ff5a2c; font-weight:700;">Pick Your
                                                    Subject</option> -->
                                            <option value="Coding Bootcamp Enrolment">Coding Bootcamp Enrolment
                                            </option>
                                            <option value="Account related">Account related
                                            </option>
                                            <option value="Bug_Issue Report">Bug_Issue Report
                                            </option>

                                            <option value="Teacher Report">Teacher Report
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 form-group">
                                        <textarea class="form-control" id="comment" name="report"
                                            placeholder="I want to join your coding bootcamp but dont know where to start....">I want to join your coding bootcamp but dont know where to start....</textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 submit-btn">
                                        <button type="submit" name="submit" class="text-center">Send Massage</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- Contact Info Wrappper-->



<section class="contact_map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mr-auto p-0">
                <h2 class="disabled">Google Map</h2>
                <div class="google_map">
                    <div class="gmap">
                        <div id="map"></div>
                    </div><!-- Ends: .gmap -->
                </div>
            </div>
        </div>
    </div>
</section> <!-- Ends: Google Map Area -->



<?php
include('included/footer.php');
?>