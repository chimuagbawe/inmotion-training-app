<?php
session_start();
include('included/header.php');

?>

<body>


    <div class="intro_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="intro_text">
                        <h1>Forgot Password</h1>
                        <div class="pages_links">
                            <a href="index.php" title="">Home</a>
                            <a href="#" title="" class="active">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header> <!-- End Header -->
    <?php include('included/signUp.php') ?>
    <!-- forgot pass section -->
    <section class="forgot_pass" style="padding: 50px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-sm-7 col-md-7 col-lg-7 mx-auto">
                    <div class="forgot_wrapper" style="box-shadow: 0px 3px 15px black;">
                        <h6>Lost your password? Please enter your registered email address. You will receive a link
                            to
                            create a new password via email.</h6>
                        <form method="post" action="Form_handlers\resetPasswordHandler.php">
                            <div class="form-group">
                                <input class="required form-control" placeholder="Write your registered email address"
                                    name="email" type="text" required>
                                <span
                                    style="color:#ff5a2c"><?php if(isset($_SESSION['emailError'])){echo $_SESSION['emailError'];}?></span>
                            </div>
                            <div class="form-group register-btn">
                                <button type="submit" class="btn btn-primary reset_pass_btn" name="submit"
                                    id="Reset Password">Reset
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ End section -->



    <section id="scroll-top" class="scroll-top">
        <h2 class="disabled">Scroll to top</h2>
        <div class="to-top pos-rtive">
            <a href="#"><i class="flaticon-right-arrow"></i></a>
        </div>
    </section>
    <?php
include('included/footer.php');
?>