<?php
session_start();
include("Database/connection.php");
$targetDepartments = ['Frontend-Web Development', 'Backend-Web Development', 'Fullstack-Web Development', 'Mobile App Development', 'User-Experience(UX) Design', 'User-Interface(UI) Design'];

// Initialize variables for each department count
$frontendCount = 0;
$backendCount = 0;
$fullstackCount = 0;
$mobileCount = 0;
$uxCount = 0;
$uiCount = 0;

// Loop through each department
foreach ($targetDepartments as $targetDepartment) {
// Query to count courses in the specified department
$countSql = "SELECT COUNT(*) as courseCount
FROM courses c
INNER JOIN teachers t ON c.teacher_id = t.id
WHERE t.department = '$targetDepartment'";

$countResult = mysqli_query($con, $countSql);

if ($countResult) {
$countData = mysqli_fetch_assoc($countResult);
$courseCount = $countData['courseCount'];

// Assign the count to the corresponding variable based on the department
switch ($targetDepartment) {
case 'Frontend-Web Development':
$_SESSION['frontendCount'] = $courseCount;
$frontendCount = $_SESSION['frontendCount'];
break;
case 'Backend-Web Development':
$_SESSION['backendCount'] = $courseCount;
$backendCount = $_SESSION['backendCount'];
break;
case 'Fullstack-Web Development':
$_SESSION['fullstackCount'] = $courseCount;
$fullstackCount = $_SESSION['fullstackCount'];
break;
case 'Mobile App Development':
$_SESSION['mobileCount'] = $courseCount;
$mobileCount = $_SESSION['mobileCount'];
break;
case 'User-Experience(UX) Design':
$_SESSION['uxCount'] = $courseCount;
$uxCount = $_SESSION['uxCount'];
break;
case 'User-Interface(UI) Design':
$_SESSION['uiCount'] = $courseCount;
$uiCount = $_SESSION['uiCount']; 
break;
// Add more cases for additional departments if needed
}
} else {
// Handle database query error
echo "Query failed for $targetDepartment: " . mysqli_error($con);
}
}

// Query to select popular courses with 40 students and above
$sql = "SELECT * FROM courses WHERE student_count >= 40 ORDER BY created_at DESC LIMIT 6";
$result = mysqli_query($con, $sql);

if ($result) {
// Fetch all rows
$popularCourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sql3 = "SELECT * FROM events ORDER BY created_at DESC LIMIT 3";
$result3 = mysqli_query($con, $sql3);
$events = mysqli_fetch_all($result3, MYSQLI_ASSOC);



mysqli_free_result($result); // Free the result set
} else {
// Handle the case where the query fails
echo "Query failed: " . mysqli_error($con);
}
include 'included/functions.php';
$counter = 0;
include('included/header.php');

?>
<div class="rev_slider_wrapper">
    <div id="rev_slider_1" class="rev_slider">
        <ul>
            <li data-index="rs-1706" data-transition="fade" data-slotamount="7" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1000"
                data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                data-param10="" data-description="">

                <div class="slider-overlay"></div>
                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                <img src="images/banner/banner_1.jpg" alt="Sky" class="rev-slidebg" data-bgposition="center center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg"
                    data-no-retina>
                <!-- LAYER NR. 1 -->
                <div class="tp-caption font-lora sfb tp-resizeme letter-space-5 h-p"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-200','-280','-250','-200']"
                    data-fontsize="['20','40','40','28']" data-lineheight="['70','80','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":400,"to":"o:1;","delay":100,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    style="z-index: 7; color:#fff; font-family:'Rubik', sans-serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;">
                    Empowering Future Developers, One Line of Code at a Time.
                </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3045-layer-1"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-120','-140','-140','-120']"
                    data-fontsize="['65','120','100','70']" data-lineheight="['70','120','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                    data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]"
                    style="z-index: 5; font-family:'Roboto', sans-serif; font-weight: 900; white-space: nowrap;text-transform:left;">
                    Inmotion ICT Hub has
                </div>

                <!-- LAYER NR.3 -->
                <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3045-layer-1"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-40','0','-10','-40']"
                    data-fontsize="['65','120','100','70']" data-lineheight="['70','120','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                    data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]"
                    style="z-index: 5; font-family:'Roboto', sans-serif; font-weight: 900; white-space: nowrap;text-transform:left;">
                    Got Your Back Covered.
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption rev-btn rev-btn left_btn" id="slide-2939-layer-8"
                    data-x="['left','left','left','left']" data-hoffset="['0','500','420','280']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['75','220','190','100']"
                    data-fontsize="['14','14','10','8']" data-lineheight="['34','34','30','20']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="button"
                    data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                    data-responsive_offset="on" data-responsive="off"
                    data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#ffffff;bg:#ff5a2c;bw:2px 2px 2px 2px;"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,8,8]"
                    data-paddingright="[40,40,30,25]" data-paddingbottom="[12,12,8,8]" data-paddingleft="[40,40,30,25]"
                    style="z-index: 14; white-space: nowrap; font-weight: 500; color: #ffffff;font-family:Rubik; text-transform:uppercase; background-color:#ff5a2c; border-color:rgba(0, 0, 0, 1.00); border-width:2px;  border-radius: 3px;">
                    <a <?php if(isset($_SESSION['loginId'])){?>href="contact.php"
                        <?php }else{?>class="nav-link sign-in js-modal-show" <?php } ?> style="color:#fff">Get
                        Started Now</a>

                </div>
                <!-- LAYER NR. 5 -->
                <div class="tp-caption rev-btn rev-btn right-btn" id="slide-2939-layer-8"
                    data-x="['left','left','left','left']" data-hoffset="['250','-60','-130','-100']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['75','220','190','100']"
                    data-fontsize="['14','14','10','8']" data-lineheight="['34','34','30','20']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="button"
                    data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                    data-responsive_offset="on" data-responsive="off"
                    data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#fff;bg:#ff5a2c;bw:2px 2px 2px 2px; "}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,8,8]"
                    data-paddingright="[40,40,30,25]" data-paddingbottom="[12,12,8,8]" data-paddingleft="[40,40,30,25]"
                    style="z-index: 14; white-space: nowrap;  font-weight:500; color:#ffffff; font-family:Rubik; text-transform:uppercase; background-color:#092ace; letter-spacing:1px; border-radius: 3px;">
                    <a href="course.php" style="color:#fff"> View Courses</a>
                </div>
            </li>

            <li data-index="rs-1708" data-transition="fade" data-slotamount="7" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1000"
                data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                data-param10="" data-description="">
                <div class="slider-overlay"></div>
                <img src="images/banner/banner_2.jpg" alt="Sky" class="rev-slidebg" data-bgposition="center center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg"
                    data-no-retina>
                <!-- LAYER NR. 1 -->
                <div class="tp-caption font-lora sfb tp-resizeme letter-space-5 h-p"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-200','-280','-250','-200']"
                    data-fontsize="['20','40','40','28']" data-lineheight="['70','80','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":400,"to":"o:1;","delay":100,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    style="z-index: 7; color:#fff; font-family:'Rubik', sans-serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;">
                    Empowering Future Developers, One Line of Code at a Time.
                </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3045-layer-11"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-120','-140','-140','-120']"
                    data-fontsize="['65','120','100','70']" data-lineheight="['70','120','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                    data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]"
                    style="z-index: 5; font-family:'Roboto', sans-serif; font-weight: 700; white-space: nowrap;text-transform:left;">
                    Inmotion ICT Hub has
                </div>

                <!-- LAYER NR.3 -->
                <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3045-layer-12"
                    data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['-40','0','-10','-40']"
                    data-fontsize="['65','120','100','70']" data-lineheight="['70','120','70','70']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                    data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                    data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]"
                    style="z-index: 5; font-family:'Roboto', sans-serif; font-weight: 700; white-space: nowrap;text-transform:left;">
                    Got Your Back Covered.
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption rev-btn rev-btn left_btn" id="slide-2939-layer13"
                    data-y="['middle','middle','middle','middle']" data-voffset="['75','220','190','100']"
                    data-fontsize="['14','14','10','8']" data-lineheight="['34','34','30','20']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="button"
                    data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                    data-responsive_offset="on" data-responsive="off"
                    data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#ffffff;bg:#ff5a2c;bw:2px 2px 2px 2px;"}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,8,8]"
                    data-paddingright="[40,40,30,25]" data-paddingbottom="[12,12,8,8]" data-paddingleft="[40,40,30,25]"
                    style="z-index: 14; white-space: nowrap; font-weight: 500; color: #ffffff;font-family:Rubik; text-transform:uppercase; background-color:#ff5a2c; border-color:rgba(0, 0, 0, 1.00); border-width:2px;  border-radius: 3px;">
                    <a <?php if(isset($_SESSION['loginId'])){?>href="contact.php"
                        <?php }else{?>class="nav-link sign-in js-modal-show" <?php } ?> style="color:#fff">Get
                        Started Now</a>

                </div>
                <!-- LAYER NR. 5 -->
                <div class="tp-caption rev-btn rev-btn right-btn" id="slide-2939-layer-15"
                    data-x="['left','left','left','left']" data-hoffset="['250','-60','-130','-100']"
                    data-y="['middle','middle','middle','middle']" data-voffset="['75','220','190','100']"
                    data-fontsize="['14','14','10','8']" data-lineheight="['34','34','30','20']" data-width="none"
                    data-height="none" data-whitespace="nowrap" data-type="button"
                    data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                    data-responsive_offset="on" data-responsive="off"
                    data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#fff;bg:#ff5a2c;bw:2px 2px 2px 2px; "}]'
                    data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,8,8]"
                    data-paddingright="[40,40,30,25]" data-paddingbottom="[12,12,8,8]" data-paddingleft="[40,40,30,25]"
                    style="z-index: 14; white-space: nowrap;  font-weight:500; color:#ffffff; font-family:Rubik; text-transform:uppercase; background-color:#092ace; letter-spacing:1px; border-radius: 3px;">
                    <a href="course.php" style="color:#fff"> View Courses</a>

                </div>
            </li>

        </ul><!-- END SLIDES LIST -->
    </div><!-- END SLIDER CONTAINER -->
</div><!-- END SLIDER CONTAINER WRAPPER -->
</header> <!--  End header section-->

<?php
include('included/signUp.php');
?>

<section class="cources_highlight">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="latest_blog_carousel">
                    <div class="single_item single_item_first">
                        <div class="blog-img">
                            <img src="images/features/features_1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="blog_title">
                            <span>look At</span>
                            <h3><a href="javascript:void(0);" id="scrollButton">Next Scheduled</a></h3>
                            <p>Explore our upcoming events and stay ahead of the curve. Check out the 'Next
                                Scheduled' section to discover the exciting learning opportunities waiting for you
                                on our calendar.....</p>
                        </div>
                    </div>

                    <div class="single_item single_item_center">
                        <div class="blog-img">
                            <img src="images/features/features_2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="blog_title">
                            <span>Go To</span>
                            <h3><a href="course.php" title="">Online Courses</a></h3>
                            <p>Embark on a transformative learning experience with our online courses. From
                                programming essentials to advanced coding skills, our courses offer flexibility and
                                expertise, bringing quality education to your fingertips, wherever you are....</p>
                        </div>
                    </div>

                    <div class="single_item single_item_last">
                        <div class="blog-img">
                            <img src="images/features/features_3.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="blog_title">
                            <span>Get Your</span>
                            <h3><a href="contact.php">Practice Equipped</a></h3>
                            <p>Gear up for success! Explore our practice equipment to elevate your skills. Unleash
                                your potential with tools tailored for hands-on coding excellence.....</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- End Popular Courses Highlight -->

<section class="courses_features">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="sub_title">
                    <h2>We Have Tones of Course <br>for Your!!</h2>
                </div><!-- ends: .section-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_1">
                    <a href="courseFrontend.php" title="">
                        <img src="images/features/courses_provide_1.jpg" alt="">
                    </a>
                    <div class="feature_content">
                        <a href="courseFrontend.php" title="">
                            <h3>Front-end Web Development</h3>
                        </a>
                        <p><?php
if($frontendCount == 0)
{echo "No Courses Yet";
}elseif($frontendCount > 0){
echo "Over $frontendCount Courses";
}?></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_2">
                    <a href="courseBackend.php" title="">
                        <img src="images/features/courses_provide_2.jpg" alt="">
                    </a>
                    <div class="feature_content">
                        <a href="courseBackend.php" title="">
                            <h3>Back-end Web Development</h3>
                        </a>
                        <p><?php
if($backendCount == 0)
{echo "No Courses Yet";
}elseif($backendCount > 0){
echo "Over $backendCount Courses";
}?></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_3">
                    <a href="courseFullstack.php" title="">
                        <img src="images/features/courses_provide_3.jpg" alt="">
                    </a>
                    <div class="feature_content">
                        <a href="courseFullstack.php" title="">
                            <h3>Full-Stack</h3>
                        </a>
                        <p><?php
if($fullstackCount == 0)
{echo "No Courses Yet";
}elseif($fullstackCount > 0){
echo "Over " . $fullstackCount + $backendCount + $frontendCount . " Courses";
}?></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_4">
                    <img src="images/features/courses_provide_4.jpg" alt="">
                    <div class="feature_content">
                        <a href="courseUi.php" title="">
                            <h3>User Interface(U.I) Design</h3>
                        </a>
                        <p>
                            <?php
if($uiCount == 0)
{echo "No Courses Yet";
}elseif($uiCount > 0){
echo "Over $uiCount Courses";
}?>
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_5">
                    <img src="images/features/courses_provide_5.jpg" alt="">
                    <div class="feature_content">
                        <a href="courseUx.php" title="">
                            <h3>User Experience(U.X) Design</h3>
                        </a>
                        <p>
                            <?php
if($uxCount == 0)
{echo "No Courses Yet";
}elseif($uxCount > 0){
echo "Over $uxCount Courses";
}?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 single_features_wrapper">
                <div class="feature_single feature_single_6">
                    <img src="images/features/courses_provide_6.jpg" alt="">
                    <div class="feature_content">
                        <a href="courseMobile.php" title="">
                            <h3>Mobile App Development</h3>
                        </a>
                        <p>
                            <?php
if($mobileCount == 0)
{echo "No Courses Yet";
}elseif($mobileCount > 0){
echo "Over $mobileCount Courses";
}?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <!-- End Courses Features -->


<section class="popular_courses" style="padding-top: 0px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Our Popular Courses</h2>
                    <p>Explore our popular courses and embark on a transformative learning journey. Master in-demand
                        skills with expert-led instruction and hands-on projects.</p>
                </div><!-- ends: .section-header -->
            </div>
            <?php foreach ($popularCourses as $course) { 
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
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="course-details.php?id=<?php echo $course['id'];?>"><img
                                    src=<?php echo htmlspecialchars($course['image']);?> alt="" class="img-fluid"
                                    style="min-height:240px; max-height: 240px;"></a></div>
                        <div class="purchase_price">
                            <a href="course-details.php?id=<?php echo $course['id']; ?>"
                                class="read_more-btn"><?php echo htmlspecialchars($course['price']);?></a>
                        </div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a
                                    href="course-details.php?id=<?php echo $course['id'];?>"><?php echo htmlspecialchars($course['title']);?></a>
                            </h3>
                            <div class="teachers_name">Teacher - <a
                                    href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>" title="">
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

            </div><!-- Ends: . -->

            <?php } ?>

        </div>
</section><!-- ./ End Courses Area section -->


<section class="about_top_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="title">
                    <h2>Take The First Step To Learn With Us.</h2>
                    <p>InMotion ICT Hub steadfastly supports and inspires future developers in their transformative
                        journey towards coding mastery and innovation. We are your trusted partner, nurturing
                        potential and fostering excellence in the dynamic world of technology.</p>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 ml-auto p-0">
                <div class="banner_learn">
                    <img src="images/banner/learnstep.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="items_shape"></div>
    <div class="story_about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-7 col-lg-7">
                    <div class="story_banner">
                        <img src="images/banner/about_us.png" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="about_story_title">
                        <h2>The Story Of Our ICT Hub.</h2>
                        <p>The journey of our ICT hub began with a vision to empower aspiring programmers, sparking
                            innovation and shaping the future.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End about_top_wrapper -->



<section class="events-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="event_title_wrapper">
                    <div class="sub_title">
                        <h2>Our Upcoming Events</h2>
                        <p>Explore exciting opportunities with our upcoming events. Join us for enriching
                            experiences, networking, and knowledge-sharing. Don't miss out on what's next!</p>
                    </div><!-- ends: .section-header -->
                    <div class="envent_all_view">
                        <a href="event.php" title="">View All</a>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">
            <?php if (isset($events) && is_array($events)) { $perPage = 5; // Number of courses per page
$totalCourses = count($events); // Total number of courses
$totalPages = ceil($totalCourses / $perPage); // Calculate total pages

// Get current page or set it to 1 if not provided
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting index for courses on the current page
$startIndex = ($page - 1) * $perPage;

// Get courses for the current page
$currentEvents = array_slice($events, $startIndex, $perPage); }foreach ($currentEvents as $event) {
// Determine the position based on the counter
$positionClass = ($counter % 2 == 0) ? 'events_single' : 'events_single events_single_left';

// Display event information with the determined position
echo '<div class="col-sm-12 events_full_box">';
echo '<div class="' . $positionClass . '">';

// Toggle the position of the image div
if ($counter % 2 == 0) {
echo '<div class="event_banner">';
echo '<a href="event-details.php?id=' . $event['id'] . '"><img src="' . htmlspecialchars($event['image']) . '" alt="" class="img-fluid" style="min-height: 310px;"></a>';
echo '</div>';
}

echo '<div class="event_info">';
echo '<h3><a href="event-details.php?id=' . $event['id'] . '" title="">' . htmlspecialchars($event['title']) . '</a></h3>';
echo '<div class="events_time">';
echo '<span class="time"><i class="far fa-clock"></i>' . htmlspecialchars($event['time']) . '</span>';
echo '<span><i class="fas fa-map-marker-alt"></i>KM 46 Along East West Road</span>';
echo '</div>';
$originalString = htmlspecialchars($event['eventDescription']);

// Split the string into an array of words
$wordsArray = explode(' ', $originalString);

// Extract the first three words
$firstThreeWords = array_slice($wordsArray, 0, 30);

// Join the words back into a string
$resultString = implode(' ', $firstThreeWords);

echo '<p>' . $resultString . '</p>';
echo '<div class="event_dete">';
echo '<span class="date">' . date('d', strtotime($event['date'])) . '</span>';
echo '<span>' . date('M', strtotime($event['date'])) . '</span>';
echo '</div>';
echo '</div>';

// Toggle the position of the image div
if ($counter % 2 != 0) {
echo '<div class="event_banner">';
echo '<a href="event-details.php?id=' . $event['id'] . '"><img src="' . htmlspecialchars($event['image']) . '" alt="" class="img-fluid"></a>';
echo '</div>';
}

echo '</div>';
echo '</div>';

// Increment the counter for the next iteration
$counter++;
} ?>


        </div>

    </div>
    </div>
</section><!-- ./ End Events Area section -->



<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <div class="testimonial_title">
                    <h2>Student Say About Us.</h2>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="testimonial_text_wrapper">
                    <div class="carousel_text slider-for">
                        <div>
                            <div class="single_box wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <p>"InMotion, guided by Sir Chidera, has transformed my coding journey with
                                    unparalleled PHP expertise. Special thanks to Mr. Wilson, an extraordinary
                                    mentor, whose wisdom and support amplify the learning experience. InMotion
                                    stands as a beacon of inspiration, fostering not just skill development but a
                                    vibrant community of growth and excellence".</p>
                            </div>
                        </div>
                        <div>
                            <div class="single_box wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <p>"Learning frontend web development at InMotion under Sir Eze's guidance was
                                    transformative. Sir Eze's passion and expertise, combined with InMotion's
                                    support, created an environment where concepts blossomed into practical skills.
                                    Grateful for the knowledge gained and the inspiration to create impactful web
                                    experiences. Truly a mentor par excellence"!</p>
                            </div>
                        </div>
                        <div>
                            <div class="single_box wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                <p>"At InMotion, learning mobile app development was transformative with stellar
                                    instructors like Sir Williams, Mr. Prince, and Mr. Marvelous. Their expertise,
                                    coupled with InMotion's support, made the journey seamless. Grateful for the
                                    skills gained—InMotion truly sets the stage for success in the tech world"!</p>
                            </div>
                        </div>
                    </div>
                    <div class="reviewer_info">
                        <div class="carousel_images slider-nav">
                            <div class="restimonial_single_img">
                                <img src="images/team/review_3.jpg" alt="2" class="img-fluid">
                                <div class="name_position">
                                    <span class="name">Victor Itedje</span>
                                    <span>Web Student</span>
                                </div>
                            </div>
                            <div class="restimonial_single_img">
                                <img src="images/team/review_4.jpg" alt="2" class="img-fluid ">
                                <div class="name_position">
                                    <span class="name">James Colins</span>
                                    <span>Flutter Student</span>
                                </div>
                            </div>
                            <div class="restimonial_single_img ">
                                <img src="images/team/review_1.jpg" alt="2" class="img-fluid">
                                <div class="name_position">
                                    <span class="name">Obioma King</span>
                                    <span>PHP Student</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section><!-- End Testimonial -->

<section id="priceing" class="priceing">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Join Our Coding Bootcamp</h2>
                    <p>Dive into hands-on coding experiences. Unlock your potential with our immersive Coding
                        Bootcamp. Join us to master programming skills and transform your career journey.</p>
                </div><!-- ends: .section-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pricing_wrapper">
                    <div class="single_price_table">
                        <div class="pricing_title">
                            <h2>UI Design</h2>
                        </div>
                        <div class="price">
                            <p><span class="currency">$</span>13<sub class="duration">Month</sub></p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled">
                                <li>100 Free Classes</li>
                                <li><del>960 Premium Classes</del></li>
                                <li>Free Template Designs</li>
                                <li><del>Cross Platforms Apps</del></li>
                                <li>Offline Access</li>
                                <li>Support Teachers</li>
                            </ul>
                            <div class="pricing_btn">
                                <a href="contact.php" class="#">Enroll Now</a>
                            </div>
                        </div>
                    </div><!-- Plan Single Ends -->

                    <div class="single_price_table active">
                        <div class="pricing_title">
                            <h2>Mobile App</h2>
                        </div>
                        <div class="price">
                            <p><span class="currency">$</span>21<sub class="duration">Month</sub></p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled">
                                <li>250 Free Classes</li>
                                <li>960 Premium Classes</li>
                                <li>Expert Community (IOS, Android)</li>
                                <li>Individual Languages(Java, Python etc..)</li>
                                <li>Offline Access</li>
                                <li>Support Teachers</li>
                            </ul>
                            <div class="pricing_btn">
                                <a href="contact.php" class="#">Enroll Now</a>
                            </div>
                        </div>
                    </div><!-- Plan Single Ends -->
                    <div class="single_price_table">
                        <div class="pricing_title">
                            <h2>Fullstack</h2>
                        </div>
                        <div class="price">
                            <p><span class="currency">$</span>19<sub class="duration">Month</sub></p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled">
                                <li>Offline Access</li>
                                <li>Powerful Website Metrics</li>
                                <li>Individual Languages(Swift, React etc..)</li>
                                <li>Front-end Or Back-end</li>
                                <li>Support Teachers</li>
                                <li>24/7 Customer Support</li>
                            </ul>
                            <div class="pricing_btn">
                                <a href="contact.php" class="#">Enroll Now</a>
                            </div>
                        </div>
                    </div><!-- Plan Single Ends -->
                </div>
            </div>
        </div>
    </div>
</section><!-- End Pricing Table -->


<section class="our_sponsor">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Trusted To Tell Their Story</h2>
                    <p>Discover the stories entrusted to us — a testament to the trust placed in our commitment to
                        share narratives authentically and powerfully.</p>
                </div><!-- ends: .section-header -->
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="sponsored_company_logos">
                    <li><img src="images/logos/logo-1.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".1s"></li>
                    <li><img src="images/logos/logo-2.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".2s"></li>
                    <li><img src="images/logos/logo-3.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".3s"></li>
                    <li><img src="images/logos/logo-4.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".6s"></li>
                    <li><img src="images/logos/logo-5.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".5s"></li>
                </ul>
                <ul class="sponsored_company_logos sponsored_company_logos_2">
                    <li><img src="images/logos/logo-6.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".4s"></li>
                    <li><img src="images/logos/logo-7.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".3s"></li>
                    <li><img src="images/logos/logo-8.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".6s"></li>
                    <li><img src="images/logos/logo-9.png" alt="" class="img-fluid  wow fadeIn" data-wow-duration="2s"
                            data-wow-delay=".5s"></li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- ./ End Our Sponsor -->


<?php
include('included/footer.php');
?>