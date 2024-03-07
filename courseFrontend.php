<?php
session_start();
include 'Database/connection.php';
include 'included/sectionsHeader.php';
include 'included/functions.php';
include 'included/header.php';
?>
<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Front-End Development</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void(0);" title=""
                            class="active"><?php echo 'Over ' . $_SESSION['frontendCount'] . ' Courses'?> </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End Header -->
<?php include('included/signUp.php') ?>
<!--Start Courses Area Section-->
<section class="popular_courses" id="related_courses_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title">
                    <h2>Adaptive Responsive Web Development</h2>
                </div><!-- ends: .section-header -->
            </div>


            <?php
include('included\sections.php');
include('included/footer.php');
?>