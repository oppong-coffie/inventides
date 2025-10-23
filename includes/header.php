<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
}
include('./routes/dbcon.php');

?>


<!DOCTYPE html>
<html lang="en">


<!-- ./index-2.html -18:54 GMT -->

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
    <div class="top__header top-header-one pt-30 pb-30">
        <div class="container">
            <div class="top__wrapper">
                <a href="?page=home" class="main__logo">
                    <img src="assets/images/logo/logo.png" alt="logo__image">
                </a>
                <div class="search__wrp">
                    <input placeholder="Search for" aria-label="Search">
                    <button><i class="fa-solid fa-search"></i></button>
                </div>
                <div class="account__wrap">

                    <div class="account d-flex align-items-center">
                        <div class="user__icon">
                            <a href="?page=myaccount">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </div>
                        <a href="#" onclick="handleProtected('myaccount')" class="acc__cont">
                            <span class="text-white">
                                My Account
                            </span>
                        </a>
                    </div>
                    <?php
                    $total_price = 0;

                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];

                        $cart_query = "
        SELECT c.quantity, i.new_price
        FROM cart c
        JOIN items i ON c.item_id = i.id
        WHERE c.user_id = $user_id
    ";
                        $cart_result = mysqli_query($conn, $cart_query);

                        if ($cart_result && mysqli_num_rows($cart_result) > 0) {
                            while ($row = mysqli_fetch_assoc($cart_result)) {
                                $total_price += $row['quantity'] * $row['new_price'];
                            }
                        }
                    }
                    ?>

                    <div class="cart d-flex align-items-center">
                        <span class="cart__icon bg-primar">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </span>
                        <a href="#" onclick="handleProtected('cart')" class="c__one">
                            <span class="text-white fw-semibold">
                                $<?php echo number_format($total_price, 2); ?>
                            </span>
                        </a>
                    </div>


                    <div class="flag__wrap">
                        <div class="flag">
                            <img src="assets/images/flag/us.png" alt="flag">
                        </div>
                        <select name="flag">
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
            <!-- Stylish Welcome Text -->
            <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 10px;">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "
        <h6 style='
            font-family: Poppins, sans-serif;
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin: 0;
        '>
            Welcome, <span style='color: rgb(0, 215, 255); font-weight: 600;'>"
                        . htmlspecialchars($_SESSION['username']) .
                        "</span> 👋
        </h6>";
                } else {
                    echo "
        <h6 style='
            font-family: Poppins, sans-serif;
            color: #ffffff;
            font-weight: 500;
            margin: 0;
        '>
            Welcome to <span style='color: rgb(0, 215, 255); font-weight: 600;'>Inventides</span>!
        </h6>";
                }
                ?>
            </div>

        </div>
    </div>
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper pl-65">
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="main-menu">
                    <li class="d-none d-lg-block"><button id="openButton" class="side-bar-btn"><i
                                class="fa-sharp text-white fa-light mr-60 fa-bars"></i></button>
                    </li>
                    <li>
                        <a href="?page=home">Home</a>
                    </li>
                    <li>
                        <a href="?page=about">About Us</a>
                    </li>
                    <!-- <li>
                        <a href="#0">Pages <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">

                            <li class="subtwohober">
                                <a href="?page=shop-single">
                                    Shop Single
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="?page=cart">
                                    Cart Page
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="?page=support">Support</a>
                    </li>
                    <li>
                        <a href="?page=music">Music</a>
                    </li>
                    <li>
                        <a href="?page=shop">Shop</a>
                    </li>

                    <li>
                        <a href="?page=contact">Contact Us</a>
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
                            <div class="items">
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
        <p class="text-justify">The foundation of any road is the subgrade, which provides a stable base for the road
            layers above. Proper compaction of
            the subgrade is crucial to prevent settling and ensure long-term road stability.</p>
        <ul class="info py-4 mt-65 bor-top bor-bottom">
            <li><i class="fa-solid primary-color fa-location-dot"></i> <a href="#0">example@example.com</a>
            </li>
            <li class="py-4"><i class="fa-solid primary-color fa-phone-volume"></i> <a href="tel:+912659302003">+91 2659
                    302 003</a>
            </li>
            <li><i class="fa-solid primary-color fa-paper-plane"></i> <a href="#0">info.company@gmail.com</a></li>
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

    <script>
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast-message ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => toast.classList.remove('show'), 2500);
            setTimeout(() => toast.remove(), 3000);
        }

        if (!document.getElementById('toast-style')) {
            const style = document.createElement('style');
            style.id = 'toast-style';
            style.textContent = `
.toast-message {
  position: fixed;
  top: 20px;
  right: -350px;
  background: rgba(18,18,59,0.95);
  color: #fff;
  border: 1px solid #007bff;
  padding: 12px 20px;
  border-radius: 10px;
  font-weight: 500;
  box-shadow: 0 0 12px rgba(0,123,255,0.4);
  z-index: 9999;
  opacity: 0;
  transition: all 0.4s ease;
}
.toast-message.show {
  opacity: 1;
  right: 20px;
}
.toast-message.info { border-left: 5px solid #00c4ff; }
.toast-message.warning { border-left: 5px solid #ffc107; color:#111; }
.toast-message.error { border-left: 5px solid #ff4d4d; }
  `;
            document.head.appendChild(style);
        }
    </script>
    <script>
        function handleProtected(page) {
            const loggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            if (!loggedIn) {
                showToast('⚠️ Please log in to access your account.', 'warning');
                setTimeout(() => window.location.href = '?page=login', 1800);
            } else {
                window.location.href = `?page=${page}`;
            }
        }
    </script>
    