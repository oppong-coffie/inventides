<?php include_once('includes/header.php'); ?>
    <main>
        <!-- Page banner area start here -->
        <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
            <div class="container">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Checkout Page</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>Checkout</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Checkout area start here -->
        <section class="checkout-area pt-130 pb-130">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="checkout__item-left sub-bg">
                            <h3 class="mb-40">Billing Details</h3>
                            <label class="mb-10" for="name">Your Name *</label>
                            <input class="mb-20" id="name" type="text">
                            <label class="mb-10" for="email">Email Address *</label>
                            <input class="mb-20" id="email" type="email">
                            <label class="mb-10" for="companyName">Company Name (Optional)</label>
                            <input class="mb-20" id="companyName" type="text">
                            <h5 class="mb-10">Country / Region *</h5>
                            <select class="mb-20" name="subject">
                                <option value="0">United state america</option>
                                <option value="1">United Kingdom</option>
                                <option value="2">Australia</option>
                                <option value="3">Germany</option>
                                <option value="4">France</option>
                            </select>
                            <label class="mb-10" for="streetAddress">Street Address *</label>
                            <input placeholder="1837 E Homer M Adams Pkwy" class="mb-10" id="streetAddress" type="text">
                            <input class="mb-20" id="streetAddress2" type="text">
                            <label class="mb-10" for="townName">Town / City *</label>
                            <input class="mb-20" id="townName" type="text">
                            <h5 class="mb-10">State *</h5>
                            <select class="mb-20" name="subject">
                                <option value="0">Georgia / ohio / new york</option>
                                <option value="1">Georgia</option>
                                <option value="2">Ohio</option>
                                <option value="3">New York</option>
                                <option value="4">Texas</option>
                            </select>
                            <label class="mb-10" for="zipCode">ZIP Code *</label>
                            <input class="mb-20" id="zipCode" type="number">
                            <label class="mb-10" for="phone">Phone *</label>
                            <input class="mb-20" id="phone" type="text">
                            <div class="radio-btn">
                                <span></span>
                                <a class="ml-10 fw-bold" href="register.php">Create An Account?</a>
                            </div>
                            <div class="radio-btn mt-2 mb-30">
                                <span class="opacity-75"></span>
                                <p>Ship To A Different Address?</p>
                            </div>
                            <label class="mb-10" for="phone">Order Notes (Optional)</label>
                            <textarea placeholder="Note About Your Order . . ." name="notes" id="notes"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__item-right sub-bg">
                            <h3 class="mb-40">Your Order</h3>
                            <ul>
                                <li class="bor-bottom pb-4">
                                    <h4>Products</h4>
                                    <h4>Subtotal</h4>
                                </li>
                                <li class="bor-bottom py-4"><a href="#">Secretary desk</a> <span>$15.00</span></li>
                                <li class="bor-bottom py-4"><a href="#">Secretary desk</a> <span>$15.00</span></li>
                                <li class="bor-bottom py-4"><a href="#">Secretary desk</a> <span>$15.00</span></li>
                                <li class="bor-bottom py-4"><a href="#">Secretary desk</a> <span>$15.00</span></li>
                                <li class="bor-bottom py-4"><a href="#">Secretary desk</a> <span>$15.00</span></li>
                                <li class="bor-bottom py-4">
                                    <h4>Subtotal</h4>
                                    <h4>$999.00</h4>
                                </li>
                            </ul>
                            <div class="py-4 bor-bottom">
                                <h5 class="mb-10">Shipping Address</h5>
                                <span>2801 Lafayette Blvd, Norfolk, Vermont <br>
                                    23509, united state</span>
                            </div>
                            <div class="radio-btn mt-30">
                                <span class="opacity-75"></span>
                                <p>Direct Bank Transfer</p>
                            </div>
                            <div class="radio-btn mt-2">
                                <span></span>
                                <a class="ml-10 fw-bold" href="#0">Check Payments</a>
                            </div>
                            <div class="radio-btn mt-2 pb-30 bor-bottom">
                                <span class="opacity-75"></span>
                                <p>Cash On Delivery</p>
                            </div>
                            <p class="pt-30 bor-top">Your personal data will be used to process
                                your order, support your experience
                                throughout this website.</p>
                            <a href="#0" class="btn-one mt-35"><span>Place Order</span></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout area end here -->
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


<!-- ./checkout.html -19:06 GMT -->
</html>