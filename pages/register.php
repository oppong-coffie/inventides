<?php
 include_once('includes/header.php');
 ?>


    <main>
        <!-- Page banner area start here -->
        <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
            <div class="container">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Create Account</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>Create Account</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Login area start here -->
        <section class="login-area pt-130 pb-130">
            <div class="container">
                <div class="login__item">
                    <div class="row g-4">
                        <div class="col-xxl-8">
                            <div class="login__image">
                                <img src="assets/images/register/res-image1.jpg" alt="image">
                                <div class="btn-wrp">
                                    <a href="login.php">sign in</a>
                                    <a class="active" href="register.php">create account</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="login__content">
                                <h2 class="text-white mb-65">create account</h2>
                                <div class="form-area login__form">
                                    <form action="./routes/userregister.php" method="POST">
                                        <input type="text" placeholder="User Name" name="username">
                                        <input class="mt-30" type="email" placeholder="Email" name="email">
                                        <input class="mt-30" type="password" placeholder="Enter Password" name="password">
                                        <input class="mt-30" type="password" placeholder="Enter Confirm Password" name="confirm_password">
                                        <button type="submit" class="mt-30">Create Account</button>
                                        <div class="radio-btn mt-30">
                                            <span></span>
                                            <p>I accept your terms & conditions</p>
                                        </div>
                                    </form>
                                    <span class="or pt-30 pb-40">OR</span>
                                </div>
                                <div class="login__with">
                                    <a href="#0"><img src="assets/images/icon/google.svg" alt=""> continue with
                                        google</a>
                                    <a class="mt-15" href="#0"><img src="assets/images/icon/facebook.svg" alt="">
                                        continue with
                                        facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login area end here -->
    </main>

    <?php include_once('includes/footer.php'); ?>

    <!-- Back to top area start here -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top area end here -->

    <!-- Jquery 3. 7. 1 Min Js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap min Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Swiper bundle min Js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Counterup min Js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Wow min Js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Magnific popup min Js -->
    <script src="assets/js/magnific-popup.min.js"></script>
    <!-- Nice select min Js -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- Pace min Js -->
    <script src="assets/js/pace.min.js"></script>
    <!-- Isotope pkgd min Js -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Waypoints Js -->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!-- Script Js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- ./register.html -19:07 GMT -->
</html>