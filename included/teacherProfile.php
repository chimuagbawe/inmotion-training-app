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
    <style>
    .update {
        width: 100%;
        border: 0 none;
        background: #ff5a2c;
        color: #ffffff;
        padding: 13px 0;
        font-weight: 600;
        margin-top: 15px;
        font-size: 16px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        font-family: "Rubik", sans-serif;
    }

    .update:hover {
        background: #092ace;
    }

    .btn-danger {
        background-color: #ff5a2c;
        /* Set your button background color */
        border-color: #ff5a2c;
        /* Set your button border color */
        color: #6a7a83;
        /* Set your button text color */
    }

    /* Custom CSS for the modal */
    .custom-modal {
        margin-top: -60px;
        /* Adjust this value to move the modal higher */
    }
    </style>
</head>

<body>
    <header class="header_inner about_page">
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="info_wrapper">
                            <div class="contact_info">
                                <ul class="list-unstyled">
                                    <li><i class="flaticon-phone-receiver"></i>+234-9132-667-481</li>
                                    <li><i class="flaticon-mail-black-envelope-symbol"></i>inmotion@ictHub.com</li>
                                </ul>
                            </div>
                            <div class="login_info">
                                <ul class="d-flex">
                                    <li class="nav-item" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])) { ?>
                                        style="display: none;" <?php } else { ?> style="display: flex;" <?php } ?>>
                                        <a href="#" class="nav-link apply_btn sign-in js-modal-show">
                                            <i class="flaticon-user-male-black-shape-with-plus-sign"></i>
                                            Start Coding
                                        </a>
                                    </li>
                                    <li class="nav-item" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])) { ?>
                                        style="display: flex;" <?php } else { ?> style="display: none;" <?php } ?>><a
                                            href="#" class="apply_btn" id="accountInfo" data-toggle="modal"
                                            data-target="#accountInfoModal">
                                            <i class="flaticon-user-male-black-shape-with-plus-sign"></i>
                                            <?php if(isset($_SESSION) && isset($_SESSION['loginId'])) {
                    echo " " . $_SESSION['role'];
                } ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel" style="color: white">
                            <?= $_SESSION['message'] ?></h5>
                        <button type="button" class="close" id="close" style="display: none;" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
                        <p id="errorMessage" style="color: white"></p>
                        <p id="errorMessage2"
                            style="color: white; <?php if($_SESSION['emailError'] == "Course added to cart successfully."){echo 'font-weight: 900;';}?>">
                        </p>
                        <p id="errorMessage3" style="color: white"></p>
                        <p id="successMessage" style="color: white"></p>
                    </div>
                    <?php if(!empty($_SESSION['action'])){?>
                    <div class="login_info">
                        <ul class="d-flex">
                            <li class="nav-item"><a href="javascript:void(0);"
                                    style="padding-right: 10px; color: white;"
                                    class="nav-link apply_btn sign-up js-modal-show" onclick="document.getElementById('close').click();
<?php if(isset($_SESSION['action'])){?>
<?php if($_SESSION['action'] == ' Login Instead' || $_SESSION['action'] == ' Login' || $_SESSION['action'] == ' Take Me Back To Login'){ ?>
document.getElementById('select').click(); 
<?php }elseif($_SESSION['action'] == ' View mail-box' || $_SESSION['action'] == ' Recheck Mail-box'){?>  
document.getElementById('invisible').click();              
<?php }else{ ?>
document.getElementById('insert').click();      
<?php }} ?>                
"><i class="flaticon-user-male-black-shape-with-plus-sign"></i><?= $_SESSION['action'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>



        <div class="modal fade" id="accountInfoModal" tabindex="-1" role="dialog"
            aria-labelledby="accountInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="accountInfoModalLabel">User Account Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your user account information content here -->
                        <?php
                        if(isset($_SESSION) && isset($_SESSION['loginId'])){
                        echo "<p><strong>User:</strong>" . " " . $_SESSION['name'] . "</p>";
                        echo "<p><strong>Email:</strong>" . " " . $_SESSION['email'] . "</p>";
                        echo "<p><strong>Account Status:</strong> <b style='color:#ff5a2c'>Active</b></p>";
                        echo "<p><strong>Role:</strong>" . " " . $_SESSION['role'] . "</p>";
                        echo "<p><strong>Account Created:</strong>" . " " .$_SESSION['registrationTime'] . "</p>";
                        echo "<p><strong>Last Logged-in:</strong>" . " " .$_SESSION['last_activity'] . "</p>";
                        }
                        ?>
                        <!-- Add more user details as needed -->
                    </div>
                    <div class="modal-footer" id="logout">
                        <!-- Logout button -->
                        <button type="button" class="btn btn-danger" id="logoutButton"><a href="Form_handlers/logout.php
                        ">Logout </a> </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="quitModal" tabindex="-1" role="dialog" aria-labelledby="quitModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quitModalLabel">Confirmation!!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you really want to stop impacting knowledge? Your contributions are valued, and your students
                        rely on you. Think about the positive impact you've
                        had so far, besides<span><b style='color:#ff5a2c'> Future devs are at stake........</b></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="logoutButton"><a
                                href="Form_handlers/quitTeachingHandlers.php">Yes, Quit</a> </button>
                        <!-- <button type="button" class="btn btn-danger" onclick="quitTeaching()">Yes, Quit</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="edu_nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light bg-faded">
                    <a class="navbar-brand" href="index.php"><img src="images/king.png" alt="logo"
                            style="width: 200px"></a>
                    <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav nav lavalamp ml-auto menu">
                            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="course.php" class="nav-link">Courses</a></li>
                            <li class="nav-item"><a href="team.php" class="nav-link">Team</a></li>
                            <li class="nav-item"><a href="event.php" class="nav-link">Events</a></li>
                            <li class="nav-item"><a href="become-a-teacher.php" class="nav-link" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){
                                        if($_SESSION['role'] !== 'student'){?> style="display: none;" <?php } ?>
                                    style="display: flex;" <?php }else{ ?> style="display: none;" <?php } ?>>Teach</a>
                            </li>
                            <li class="nav-item"><a href="teacher-profile.php" class="nav-link active" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){
                                        if($_SESSION['role'] !== 'student'){?> style="display: flex;" <?php } ?>
                                    style="display: none;" <?php }else{ ?> style="display: none;"
                                    <?php } ?>>My-Profile</a>
                            </li>
                            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="mr-auto search_area ">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><i class="search_btn flaticon-magnifier"></i>
                                <div id="search">
                                    <button type="button" class="close">×</button>
                                    <form>
                                        <input type="search" value="" placeholder="Search here...." required />
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav><!-- END NAVBAR -->
            </div>
        </div>

        <div class="intro_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="intro_text">
                            <h1>Teachers Profile</h1>
                            <div class="pages_links">
                                <a href="index.php" title="">Home</a>
                                <a href="javascript:void()" title="" class="active">Teacher profile</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header> <!-- End header -->