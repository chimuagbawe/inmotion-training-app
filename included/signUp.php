<section class="login_signup_option">
    <div class="l-modal is-hidden--off-flow js-modal-shopify">
        <div class="l-modal__shadow js-modal-hide"></div>
        <div class="login_popup login_modal_body">
            <div class="Popup_title d-flex justify-content-between">
                <h2 class="hidden">&nbsp;</h2>
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-lg-12 login_option_btn">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" id="select" href="#login"
                                    role="tab">Login</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" id="insert" href="#panel2"
                                    role="tab">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                        <!-- Tab panels -->
                        <div class="tab-content card" style="padding-top: 20px">
                            <!--Login-->
                            <div class="tab-pane fade in show active" id="login" role="tabpanel">
                                <form action="Form_handlers/loginHandler.php" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email"
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['email'])){echo $_SESSION['email'];} ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password"
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['password'])){echo $_SESSION['password'];} ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-12 col-md-12 col-lg-12 d-flex justify-content-between login_option">
                                            <a href="forgot-password.php" title="" class="forget_pass">Forget
                                                Password ?</a>
                                            <button type="submit" name="submit"
                                                class="btn btn-default login_btn">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--/.Panel 1-->
                            <!--Panel 2-->
                            <div class="tab-pane fade" id="panel2" role="tabpanel">
                                <form action="Form_handlers/registerHandler.php" method="post" class="register">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12" style="height: 120px">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Username"
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['name'])){echo $_SESSION['name'];} ?>"
                                                    required>
                                                <span><b style="color:#ff5a2c">**</b>Only letters and white spaces
                                                    are
                                                    allowed</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12" style="height: 120px">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email"
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['email'])){echo $_SESSION['email'];} ?>"
                                                    required>
                                                <span><b style="color:#ff5a2c">**</b>Recommended Format:
                                                    example@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12" style="height: 120px">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password"
                                                    value="<?php if(isset($_SESSION) && isset($_SESSION['password'])){echo $_SESSION['password'];} ?>"
                                                    required>
                                                <span><b style="color:#ff5a2c">**</b>One uppercase letter and one
                                                    special
                                                    character.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-12 col-md-12 col-lg-12 d-flex justify-content-between login_option">
                                            <button type="submit" name="submit"
                                                class="btn btn-default login_btn">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--/.Panel 2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- End Login Signup Option -->