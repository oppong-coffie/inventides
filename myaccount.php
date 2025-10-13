<?php
include_once('includes/header.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Please log in first!');
        window.location.href = 'login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Inventides</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #0a0a23;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        /* Page Banner */
        .page-banner {
            position: relative;
            text-align: center;
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .page-banner h2 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .breadcrumb-list a {
            color: #00c4ff;
            text-decoration: none;
        }

        .breadcrumb-list span {
            color: #fff;
        }

        /* Account Details */
        .account-container {
            max-width: 600px;
            margin: 80px auto;
            background: #0a0a23;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .account-container h3 {
            color: #fff;
            margin-bottom: 30px;
            font-weight: 500;
            font-size: 24px;
        }

        .info {
            margin-bottom: 25px;
            text-align: left;
        }

        .info p {
            margin: 10px 0;
            color: #dcdcdc;
            font-size: 16px;
        }

        .label {
            font-weight: bold;
            color: #ffffff;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(90deg, #007bff, #00c4ff);
            color: #fff;
            padding: 10px 25px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(90deg, #0056b3, #0089d6);
        }

        /* Map */
        .google-map iframe {
            width: 100%;
            height: 600px;
            border: 0;
            display: block;
        }
    </style>
</head>
<body>

    <!-- HEADER -->

    <main>
        <!-- Page banner area start here -->
        <section class="page-banner bg-image pt-130 pb-130" style="background-image:url('assets/images/banner/inner-banner.jpg');">
            <div class="container">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Account Details</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>My Account</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Account Details -->
        <section class="contact pt-130 pb-130">
            <div class="account-container">

                <div class="info">
                    <p><span class="label">User ID:</span> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
                    <p><span class="label">Username:</span> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                    <p><span class="label">Email:</span> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                </div>

                <a href="routes/logout.php" class="btn">Logout</a>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Back to top area start here -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top area end here -->

    <!-- Scripts -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.waypoints.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
