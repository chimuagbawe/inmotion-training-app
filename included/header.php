<?php
if (isset($_SESSION['loginId'])) {
    $userId = $_SESSION['loginId'];

$cartQuery = "SELECT courses.price
                                  FROM cart
                                  INNER JOIN courses ON cart.course_id = courses.id
                                  WHERE cart.user_id = $userId";
                    $cartResult = mysqli_query($con, $cartQuery);

                    if ($cartResult) {
                        $totalPrice = 0;

                        // Iterate through the cart items and sum up the prices
                        while ($cartItem = mysqli_fetch_assoc($cartResult)) {
                            $coursePrice = $cartItem['price'];

                            // Handle 'Free' courses or remove '$' sign
                            if ($coursePrice != 'Free') {
                                $coursePrice = str_replace('$', '', $coursePrice);
                                $totalPrice += floatval($coursePrice);
                            }
                        }
                        // Now, $totalPrice contains the total price of courses in the cart
                        $_SESSION['totalPrice'] = "$" . number_format($totalPrice, 2);
                        $totalPricing = $totalPrice + 25.00;

                        $_SESSION['totalPricing'] = "$" . number_format($totalPricing, 2);
                    }
                }
?>
<!doctype html>
<html lang="en">


<head>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/assets/owl.theme.css">
    <link rel="stylesheet" href="css/assets/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="css/assets/slick.css">
    <link rel="stylesheet" href="css/assets/preloader.css" />

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="css/assets/revolution/layers.css">
    <link rel="stylesheet" href="css/assets/revolution/navigation.css">
    <link rel="stylesheet" href="css/assets/revolution/settings.css">
    <!-- Mean Menu-->
    <link rel="stylesheet" href="css/assets/meanmenu.css">
    <!-- main style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/demo.css">
    <style>
    .scroll {
        max-height: 150px;
        overflow-y: auto;
        /* border: 1px solid #ccc; */
        /* margin-bottom: 5px; */
    }

    .color {
        color: #ff5a2c;
        font-size: 18px;
        font-weight: 500;
    }

    .color2 {
        color: black;
        font-size: 18px;
        font-weight: 500;
    }

    .purchaseMe {
        cursor: not-allowed;
    }

    .purchaseMe:hover {
        background-color: #ff5a2c;
    }

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

    .overall {
        width: 100%;
        border-radius: 100%;
    }

    .round {
        border-radius: 100%;
        border: blue 10px solid;
        max-width: 100%;
        max-height: 80%;
    }
    </style>
</head>

<body>
    <header class="header_inner header_3
    <?php 
   if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/about.php' || $_SERVER['SCRIPT_NAME'] == '/inmotionHubIct/team.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseBackend.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseFrontend.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseMobile.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseUi.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseUx.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/courseFullstack.php'){
    echo 'about_page';
   }elseif($_SERVER['SCRIPT_NAME'] == '/inmotionHubIct/course.php'){
    echo 'courses_page';
   }elseif($_SERVER['SCRIPT_NAME'] == '/inmotionHubIct/event.php'){
    echo 'event_page';
   }elseif($_SERVER['SCRIPT_NAME'] == '/inmotionHubIct/event-details.php' || $_SERVER['SCRIPT_NAME'] == '/inmotionHubIct/course-details.php'){
    echo 'blog_page';
   }elseif($_SERVER['REQUEST_URI'] == '/inmotionHubIct/contact.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/forgot-password.php'){
    echo 'contact_page';
   }
    ?>
    ">
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <div class="header_top"
            style="<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/index.php' || $_SERVER['REQUEST_URI'] == '/inmotionHubIct/'){?> background:#ff5a2c; <?php }else{ ?> background:#333146;<?php } ?>">
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
                    echo " " . $_SESSION['name'];
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
                        <div id="errorMessage2"
                            style="color: white; <?php if($_SESSION['emailError'] == "Course added to cart successfully."){echo 'font-weight: 900;';}?>">

                        </div>
                        <p id="errorMessage3" style="color: white;"></p>
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
                        <button type="button" class="btn btn-danger" id="logoutButton"><a href="Form_handlers\logout.php
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
                            <li class="nav-item"><a href="index.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/index.php'){?> active<?php } ?>">Home</a>
                            </li>
                            <li class="nav-item"><a href="about.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/about.php'){?> active<?php } ?>">About</a>
                            </li>
                            <li class="nav-item"><a href="course.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/course.php'){?> active<?php } ?>">courses</a>
                            </li>
                            <li class="nav-item"><a href="team.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/team.php'){?> active<?php } ?>">team</a>
                            </li>
                            <li class="nav-item"><a href="event.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/event.php'){?> active<?php } ?>">events</a>
                            </li>
                            <li class="nav-item"><a href="become-a-teacher.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/become-a-teacher.php'){?> active<?php } ?>" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){
                                        if($_SESSION['role'] !== 'student'){?> style="display: none;" <?php } ?>
                                    style="display: flex;" <?php }else{ ?> style="display: none;" <?php } ?>>Teach</a>
                            </li>
                            <li class="nav-item"><a href="teacher-profile.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/teacher-profile.php'){?> active<?php } ?>" <?php if(isset($_SESSION) && isset($_SESSION['loginId'])){
                                        if($_SESSION['role'] !== 'student'){?> style="display: flex;" <?php } ?>
                                    style="display: none;" <?php }else{ ?> style="display: none;"
                                    <?php } ?>>My-Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.php"
                                    class="nav-link<?php if($_SERVER['REQUEST_URI'] == '/inmotionHubIct/contact.php'){?> active<?php } ?>">Contact</a>
                            </li>
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
                            <?php
if (isset($_SESSION) && isset($_SESSION['loginId'])) {
$userId = $_SESSION['loginId'];
$cartQuery = "SELECT courses.* FROM courses
INNER JOIN cart ON courses.id = cart.course_id
WHERE cart.user_id = $userId";
$cartResult = mysqli_query($con, $cartQuery);

if ($cartResult) {
$cartCourses = mysqli_fetch_all($cartResult, MYSQLI_ASSOC);
$_SESSION['numCartCourses'] = count($cartCourses);
$numCartCourses = $_SESSION['numCartCourses'];

if ($numCartCourses == 0) {
$myCart = 'There is no Course in your Cart';
}
}
?>
                            <li class="nav-item cart_icon">
                                <i class="flaticon-shopping-bag">
                                    <p><?php echo $numCartCourses; ?></p>
                                </i>
                                <div class="cart_list">
                                    <div class="scroll">

                                        <?php
if ($numCartCourses > 0) {
foreach ($cartCourses as $cartCourse) {
$_SESSION['courseId'] = $cartCourse['id'];
?>
                                        <div class="single_cart d-flex">
                                            <div class="cart_banner">
                                                <a href="course-details.php?id=<?php echo $cartCourse['id']; ?>"><img
                                                        alt="" src=<?php echo htmlspecialchars($cartCourse['image']); ?>
                                                        class="img-fluid"></a>
                                            </div>
                                            <div class="cart_info" style="padding: 0px 10px;">
                                                <h4><a
                                                        href="course-details.php?id=<?php echo $cartCourse['id']; ?>"><?php echo $cartCourse['title']; ?></a>
                                                </h4>
                                                <span
                                                    class="price"><?php echo htmlspecialchars($cartCourse['price']); ?>
                                                    <?php if($cartCourse['price'] !== 'Free'){?>
                                                    <span>x 1</span><?php } ?>
                                                </span>
                                            </div>
                                            <div class="del-icon ms-auto">
                                                <a
                                                    href="Database\deleteCourseCart.php?id=<?php echo $cartCourse['id']; ?>&n=<?php echo $cartCourse['title']?>"><i
                                                        class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php if($_SESSION['totalPrice'] == '$0.00'){echo 'Completely free No charges or fees!';}else{?>
                                    <div class="cart_calculate_wrapper" style="padding-top: 30px;">
                                        <div class="calculate_price"><span>Sub-Total
                                                :</span><span><?php if(isset($_SESSION['totalPrice'])){echo $_SESSION['totalPrice'];}?></span>
                                        </div>
                                        <div class="calculate_price"><span>Eco Tax (-2.00)
                                                :</span><span><span>$25.00</span></div>
                                        <div class="calculate_price"><span>Total: </span><span
                                                class="total_price"><?php if(isset($_SESSION['totalPrice'])){echo $_SESSION['totalPricing'];}?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="purchase_btn d-flex justify-content-between">
                                        <a class="cart_button"
                                            href="javascript:void()"><?php if($numCartCourses > 1) {echo $numCartCourses . " Courses";}else{echo "Single Course";}?></a>
                                        <a class="checkout" href="Form_handlers\checkoutHandler.php">checkout</a>
                                    </div>
                                </div>
                                <?php } else {
                                    echo '<p>' . $myCart . '</p>';
                                    }}
                                    ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>