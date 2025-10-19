<?php
session_start();
include('dbcon.php');

$total_price = 0;
$total_items = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $cart_query = "
        SELECT c.quantity, i.price
        FROM cart c
        JOIN items i ON c.item_id = i.id
        WHERE c.user_id = $user_id
    ";
    $cart_result = mysqli_query($conn, $cart_query);

    if ($cart_result && mysqli_num_rows($cart_result) > 0) {
        while ($row = mysqli_fetch_assoc($cart_result)) {
            $total_items += $row['quantity'];
            $total_price += $row['quantity'] * $row['price'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">


<!-- ./index-2-light.html -19:00 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTEDIS</title>
    <!-- Favicon img -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- All min css -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Header area start here -->
    <div class="top__header ns-light top-header-one pt-30 pb-30">
        <div class="container">
            <div class="top__wrapper">
                <a href="index.php" class="main__logo">
                    <img src="assets/images/logo/logo.png" alt="logo__image">
                </a>
                <div class="search__wrp">
                    <input placeholder="Search for" aria-label="Search">
                    <button><i class="fa-solid fa-search"></i></button>
                </div>
                <div class="account__wrap">
                    <div class="account d-flex align-items-center">
                        <div class="user__icon">
                            <a href="#0">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </div>
                        <a href="#0" class="acc__cont">
                            <span class="text-black">
                                My Account
                            </span>
                        </a>
                    </div>
                    <div class="cart d-flex align-items-center">
                        <span class="cart__icon">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </span>
                        <a href="cart.php" class="c__one">
                            <span class="text-black">
                                $<?php echo number_format($total_price, 2); ?>
                            </span>
                        </a>
                        <span class="one">
                            <?php echo $total_items; ?>
                        </span>
                    </div>

                    <div class="flag__wrap">
                        <div class="flag">
                            <img src="assets/images/flag/us.png" alt="flag">
                        </div>
                        <select name="flag flag-light">
                            <option value="0">
                                Usa
                            </option>
                            <option value="1">
                                Canada
                            </option>
                            <option value="2">
                                Australia
                            </option>
                            <option value="3">
                                Germany
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-section black-area">
        <div class="container">
            <div class="header-wrapper pl-65">
                <div class="header-bar light-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="main-menu">
                    <li class="d-none d-lg-block"><button id="openButton" class="side-bar-btn"><i
                                class="fa-sharp text-white fa-light mr-60 fa-bars"></i></button>
                    </li>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li>
                        <a href="#0">Pages <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">

                            <li class="subtwohober">
                                <a href="shop-single.php">
                                    Shop Single
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="cart.php">
                                    Cart Page
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="checkout.php">
                                    Checkout Page
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="register.php">
                                    Register
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="login.php">
                                    Login
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="error.php">
                                    404 Error
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="support.php">Support</a>
                    </li>
                    <li>
                        <a href="music.php">Music</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>

                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="shipping__item d-none d-sm-flex align-items-center">
                    <div class="menu__right d-flex align-items-center">
                        <div class="thumb">
                            <img src="assets/images/flag/picking.png" alt="image">
                        </div>
                        <div class="content">
                            <p>
                                Picking up?
                            </p>
                            <div class="items ns-head">
                                <select class="form__select p-0">
                                    <option value="1">
                                        Select Store
                                    </option>
                                    <option value="2">
                                        Store One
                                    </option>
                                    <option value="3">
                                        Store Two
                                    </option>
                                    <option value="3">
                                        Store Three
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="menu__right d-flex align-items-center">
                        <div class="thumb">
                            <img src="assets/images/flag/shipping.png" alt="image">
                        </div>
                        <div class="content">
                            <p>
                                Free Shipping <br> on order <strong>over $100</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header area end here -->

    <!-- Sidebar area start here -->
    <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
        <div class="side_bar_overlay"></div>
        <div class="logo mb-30">
            <img src="assets/images/logo/logo.svg" alt="logo">
        </div>
        <p class="text-justify text-white">The foundation of any road is the subgrade, which provides a stable base for
            the road
            layers above. Proper compaction of
            the subgrade is crucial to prevent settling and ensure long-term road stability.</p>
        <ul class="info py-4 mt-65 bor-top bor-bottom">
            <li><i class="fa-solid primary-color fa-location-dot"></i> <a class="text-white"
                    href="#0">example@example.com</a>
            </li>
            <li class="py-4"><i class="fa-solid primary-color fa-phone-volume"></i> <a class="text-white"
                    href="tel:+912659302003">+91 2659
                    302 003</a>
            </li>
            <li><i class="fa-solid primary-color fa-paper-plane"></i> <a class="text-white"
                    href="#0">info.company@gmail.com</a></li>
        </ul>
        <div class="social-icon mt-65">
            <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#0"><i class="fa-brands fa-twitter"></i></a>
            <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#0"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <button id="closeButton" class="text-white"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <!-- Sidebar area end here -->

    <!-- Preloader area start -->
    <div class="loading">
        <span class="text-capitalize">L</span>
        <span>o</span>
        <span>a</span>
        <span>d</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
    </div>

    <div id="preloader">
    </div>
    <!-- Preloader area end -->

    <!-- Mouse cursor area start here -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Mouse cursor area end here -->