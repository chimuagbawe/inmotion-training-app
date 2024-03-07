<?php
// var_dump($_SERVER);
// die();
session_start();
include("Database/connection.php");
if(!empty($_GET['id'])){
$id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "SELECT * FROM events WHERE id = $id";
$result = mysqli_query($con, $sql);
$event = mysqli_fetch_assoc($result);
// var_dump($event);
// die();
if($event){
    $sql3 = "SELECT * FROM events ORDER BY created_at DESC LIMIT 3";
    $result3 = mysqli_query($con, $sql3);
    $events = mysqli_fetch_all($result3, MYSQLI_ASSOC);
}else{
    header("Location: event.php");   
}}else{
    header("Location: event.php");   
}
include('included/header.php');

?>



<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Event Details</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="event.php" title="">Event</a>
                        <a href="javascript:void()" title=""
                            class="active"><?php if($event){echo $event['title'];}?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End Header -->
<?php include('included/signUp.php') ?>
<section class="event_details_wrapper blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="event_intro">
                    <img src=<?php if($event){echo $event['image'];}?> alt="" class="img-fluid"
                        style="min-width: 750px;">
                    <div class="post_content">
                        <div class="post_by d-flex justify-content-between">
                            <span class="date_event"><?php if($event){echo $event['date'];}?></span>
                            <span><?php if($event){echo $event['time'];}?></span>
                        </div>
                        <div class="blog_post_content">
                            <p><?php if($event){echo $event['eventDescription'];}?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">


                    <div class="recent_post_wrapper popular_courses_post widget_single">
                        <div class="items-title">
                            <h3 class="title">Our Recent Events</h3>
                        </div>
                        <?php foreach($events as $event1){ ?>
                        <div class="single-post">
                            <div class="recent_img">
                                <a href="<?php echo 'event-details.php?id=' . $event1['id']?>" title=""><img
                                        src=<?php echo $event1['image'] ?> alt="" class="img-fluid"></a>
                            </div>
                            <div class="post_title">
                                <a href="<?php echo 'event-details.php?id=' . $event1['id']?>"
                                    title=""><?php echo $event1['title']?></a>
                                <div class="post-date">
                                    <span><?php echo $event1['date']?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="archives widget_single">
                        <div class="items-title">
                            <h3 class="title">All Categories</h3>
                        </div>
                        <div class="archives-items">
                            <ul class="list-unstyled">
                                <li><a href="courseFrontend.php" title="">Front-end Development </a></li>
                                <li><a href="courseBackend.php" title="">Back-end Development</a></li>
                                <li><a href="courseFullstack.php" title="">Full-Stack</a></li>
                                <li><a href="courseUi.php" title="">User Interface(U.I) Design</a></li>
                                <li><a href="courseUx.php" title="">User Experience(U.X) Design</a></li>
                                <li><a href="courseMobile.php" title="">Mobile App Development</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="location_bottom_wrapper">
                    <div class="event_details">
                        <div class="details_title">
                            <h3>Event Details</h3>
                        </div>
                        <div class="event_location_info">
                            <ul class="list-unstyled">
                                <li>
                                    <p>Date</p><span><?php if($event){echo $event['date'];}?></span>
                                </li>
                                <li>
                                    <p>Time</p><span><?php if($event){echo $event['time'];}?></span>
                                </li>
                                <li>
                                    <p>Cost</p><span><?php if($event){echo $event['price'];}?></span>
                                </li>
                                <li>
                                    <p>Event Category</p><span><?php if($event){echo $event['type'];}?></span>
                                </li>
                                <li>
                                    <p>Email</p><span><?php if($event){echo $event['email'];}?></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li>
                                    <p class="hall_location">Location</p>
                                </li>
                                <li>
                                    <p><?php if($event){echo $event['location'];}?></span>
                                </li>
                                <li>
                                    <p>Email</p><span><?php if($event){echo $event['email'];}?></span>
                                </li>
                                <li>
                                    <p>Phone</p><span><?php if($event){echo $event['phone'];}?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include('included/footer.php');
?>