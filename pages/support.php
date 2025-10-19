<?php include_once('includes/header.php'); ?>


<main>
    <!-- Page banner area start here -->
    <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
        <div class="container">
            <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Support Center</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                        class="fa-regular text-white fa-angle-right"></i></a>
                <span>Support</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Contact options area start here -->
    <section class="contact-options pt-130 pb-100 bg-image" data-background="assets/images/bg/support-bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-options__content">
                        <div class="section-header">
                            <div class="section-title-icon">
                                <span class="title-icon mr-10"></span>
                                <h4 class="sub-title">If you need to meet us for a specific service</h4>
                            </div>
                            <h2 class="mt-20 mb-30">Tell us what you want and how you want to be helped</h2>
                            <ul class="list mt-30">
                                <li class="mb-3">You can call us</li>
                                <li class="mb-3">Write to us on WhatsApp</li>
                                <li>Or fill out this form with your details and the service you want and we will call you</li>
                            </ul>
                        </div>
                        
                        <div class="contact-buttons d-flex flex-wrap gap-4 mt-40">
                            <a href="tel:+250788273785" class="btn-one d-flex align-items-center">
                                <i class="fa-solid fa-phone me-3"></i>
                                <span>Call Now</span>
                            </a>
                            <a href="https://wa.me/250788273785?text=Hello%21%0AI%20need%20help%20with%20the%20following%3A" target="_blank" class="btn-two d-flex align-items-center">
                                <i class="fa-brands fa-whatsapp me-3"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="contact-info-items">
                        <div class="contact-info__item mb-5">
                            <a href="https://wa.me/250788273785?text=Hello%21%0AI%20need%20help%20with%20the%20following%3A" target="_blank" class="d-flex align-items-center p-4 radius-10 sub-bg">
                                <div class="contact-icon mr-4">
                                    <i class="fab fa-whatsapp fa-2x primary-color"></i>
                                </div>
                                <div class="contact-content">
                                    <h5 class="mb-1">WhatsApp Message</h5>
                                    <p class="mb-0">+250 788 273 785</p>
                                </div>
                            </a>
                        </div>
                        
                        <div class="contact-info__item">
                            <a href="tel:+250788273785" class="d-flex align-items-center p-4 radius-10 sub-bg">
                                <div class="contact-icon mr-4">
                                    <i class="fas fa-phone-plus fa-2x primary-color"></i>
                                </div>
                                <div class="contact-content">
                                    <h5 class="mb-1">Instant Call</h5>
                                    <p class="mb-0">+250 788 273 785</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact options area end here -->

    <!-- Pricing area start here -->
    <section class="pricing-area pt-130 pb-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section-header">
                        <div class="section-title-icon">
                            <span class="title-icon mr-10"></span>
                            <h4 class="sub-title">About requesting a dedicated technician from us</h4>
                        </div>
                        <h2 class="mt-20">You can request a technician to help you specifically at a certain time to help you inspect and test your equipment</h2>
                    </div>
                    <div class="pricing-tab mt-40">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="price-daily-tab" data-bs-toggle="tab" data-bs-target="#price-daily" type="button" role="tab" aria-controls="price-daily" aria-selected="true">
                                    Per Day
                                </button>
                                <button class="nav-link" id="price-monthly-tab" data-bs-toggle="tab" data-bs-target="#price-monthly" type="button" role="tab" aria-controls="price-monthly" aria-selected="false">
                                    Per Month
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="price-daily" role="tabpanel" aria-labelledby="price-daily-tab">
                            <div class="pricing-item sub-bg radius-10 p-5">
                                <div class="pricing-header text-center mb-4">
                                    <div class="pricing-icon mb-3">
                                        <i class="fa-solid fa-screwdriver-wrench fa-3x primary-color"></i>
                                    </div>
                                    <h4>Daily Technician</h4>
                                    <h2 class="mt-3 mb-3">35,000 Rwf <sub>/Per Day</sub></h2>
                                    <p class="mb-4">
                                        This price does not include purchasing damaged parts/equipment that need repair or transportation.
                                    </p>
                                    <div class="button mt-4">
                                        <a class="btn-one" href="contact-us.php">Request a Technician</a>
                                    </div>
                                </div>
                                <div class="pricing-info mt-4 pt-4 bor-top">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><i class="fas fa-check-circle primary-color me-2"></i> You can use them for the whole day</li>
                                        <li class="mb-3"><i class="fas fa-check-circle primary-color me-2"></i> You can call them for telephone assistance regarding the service they provided for the next 3 days</li>
                                        <li><i class="fas fa-check-circle primary-color me-2"></i> Pay 1/3 in advance, the rest is paid after you receive the service</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="price-monthly" role="tabpanel" aria-labelledby="price-monthly-tab">
                            <div class="pricing-item sub-bg radius-10 p-5">
                                <div class="pricing-header text-center mb-4">
                                    <div class="pricing-icon mb-3">
                                        <i class="fa-solid fa-screwdriver-wrench fa-3x primary-color"></i>
                                    </div>
                                    <h4>Technician</h4>
                                    <h2 class="mt-3 mb-3">800,000 Rwf <sub>/Per Month</sub></h2>
                                    <p class="mb-4">
                                        This price includes transportation to come to you when you need them, but does not include purchasing damaged parts/equipment that need repair.
                                    </p>
                                    <div class="button mt-4">
                                        <a class="btn-one" href="contact-us.php">Request a Technician</a>
                                    </div>
                                </div>
                                <div class="pricing-info mt-4 pt-4 bor-top">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><i class="fas fa-check-circle primary-color me-2"></i> You can use them for the whole month</li>
                                        <li class="mb-3"><i class="fas fa-check-circle primary-color me-2"></i> You can call them for telephone assistance regarding the service they provided in the following month</li>
                                        <li><i class="fas fa-check-circle primary-color me-2"></i> Pay 1/2 in advance, the rest is paid after you receive the service</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing area end here -->

    <!-- Service quality area start here -->
    <section class="service-quality pt-130 pb-130 bg-image" data-background="assets/images/bg/about-bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="quality-item sub-bg radius-10 p-5 text-center">
                        <div class="quality-content">
                            <div class="progress-circle mb-4">
                                <div class="circle" data-percent="99.9">
                                    <strong>99.9%</strong>
                                </div>
                            </div>
                            <h4 class="mb-3">About the services mentioned above</h4>
                            <p class="mb-0">
                                Our technicians are reliable, qualified and happy to serve you anytime. For money paid for services, technology is used to give you a valid receipt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service quality area end here -->

    <!-- Technicians area start here -->
    <section class="technicians-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-header text-center">
                        <div class="section-title-icon justify-content-center">
                            <span class="title-icon mr-10"></span>
                            <h4 class="sub-title">Technicians</h4>
                        </div>
                        <h2 class="mt-20">These are some of our technicians</h2>
                    </div>
                </div>
            </div>
            
            <div class="row mt-50">
                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="technician-item text-center">
                        <div class="technician-image mb-4 mx-auto position-relative">
                            <div class="image-placeholder">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="technician-info">
                            <h4 class="mb-2">Samuel NDAYISHIMIYE</h4>
                            <span class="primary-color">Gaming machine technician</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="technician-item text-center">
                        <div class="technician-image mb-4 mx-auto position-relative">
                            <div class="image-placeholder">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="technician-info">
                            <h4 class="mb-2">Lil Nas</h4>
                            <span class="primary-color">Computer and gaming machine technician</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="technician-item text-center">
                        <div class="technician-image mb-4 mx-auto position-relative">
                            <div class="image-placeholder">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="technician-info">
                            <h4 class="mb-2">Me</h4>
                            <span class="primary-color">Computer and application technician</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="technician-item text-center">
                        <div class="technician-image mb-4 mx-auto position-relative">
                            <div class="image-placeholder">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="technician-info">
                            <h4 class="mb-2">Roben</h4>
                            <span class="primary-color">Cashier</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </section>
    <!-- Technicians area end here -->

    <!-- Support form area start here -->
    <section class="support-form-area pt-130 pb-130 bg-image" data-background="assets/images/bg/contact-bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="support-form-info">
                        <div class="section-header">
                            <div class="section-title-icon">
                                <span class="title-icon mr-10"></span>
                                <h4 class="sub-title">Where to request services</h4>
                            </div>
                            <h2 class="mt-20 mb-30">Fill out this form to request a service or technician</h2>
                            <ul class="list mt-30">
                                <li class="mb-3"><i class="fas fa-check-circle primary-color me-2"></i> It's reliable: You get a receipt when you pay</li>
                                <li><i class="fas fa-check-circle primary-color me-2"></i> It's fast: Doesn't exceed 24 hours</li>
                            </ul>
                        </div>
                        
                        <div class="contact-alternative mt-50">
                            <div class="contact-item d-flex align-items-center p-3 radius-10 sub-bg">
                                <div class="contact-icon mr-3">
                                    <i class="fal fa-user-headset fa-2x primary-color"></i>
                                </div>
                                <div class="contact-content">
                                    <h5 class="mb-1">Or call us</h5>
                                    <a href="tel:+250788273785" class="primary-hover">+250 788 273 785</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 offset-lg-1">
                    <div class="support-form-wrp sub-bg radius-10 p-5">
                        <h3 class="mb-4">Request Support</h3>
                        <form class="support-request-form">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="First Name Last Name" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="username@domain.com" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Telephone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+250 700 000 000" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="service" class="form-label">Service</label>
                                        <select class="form-select" id="service" name="service" required>
                                            <option value="" selected disabled>Choose service</option>
                                            <option value="technician">I need a dedicated technician</option>
                                            <option value="equipment">I need equipment</option>
                                            <option value="proforma">I need a proforma</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Additional Information</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write here anything else you want to tell us..."></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn-one w-100">
                                        <span>Send <i class="fas fa-angle-right ms-2"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Support form area end here -->
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


<!-- ./about.html -19:03 GMT -->
</html>