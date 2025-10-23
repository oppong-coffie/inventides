<?php

include_once('./includes/header.php');

include './routes/dbcon.php';

// Get product ID from URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // cast to integer for safety
} else {
    die("No product ID provided.");
}

// Fetch the product by ID
$sql = "SELECT * FROM items WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $item = mysqli_fetch_assoc($result);
} else {
    die("Product not found.");
}
?>

<main>
    <!-- Page banner area start here -->
    <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
        <div class="container">
            <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Shop Details</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                <a href="?page=home" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                        class="fa-regular text-white fa-angle-right"></i></a>
                <a href="?page=shop" class="primary-hover"> shop <i
                        class="fa-regular text-white fa-angle-right"></i></a>
                <span>Shop Details</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Shop single area start here -->
    <section class="shop-single pt-130 pb-130">
        <div class="container">
            <!-- product-details area start here -->
            <div class="product-details-single pb-40">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <?php $images = json_decode($item['shop_images'], true); ?>
                        <div class="image img">
                            <!-- Main Slider -->
                            <div class="swiper shop-single-slide" id="productGallery">
                                <div class="swiper-wrapper">
                                    <?php if ($images && is_array($images) && count($images) > 0): ?>
                                        <?php foreach ($images as $img): ?>
                                            <div class="swiper-slide">
                                                <img src="assets/images/shop/<?php echo htmlspecialchars($img); ?>" alt="Product image">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="swiper-slide">
                                            <img src="assets/images/shop/default.jpg" alt="No image available">
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <!-- Arrows INSIDE the main slider -->
                                <?php if ($images && count($images) > 1): ?>
                                    <div class="swiper-button-prev shop-single-prev"></div>
                                    <div class="swiper-button-next shop-single-next"></div>
                                <?php endif; ?>
                            </div>

                            <!-- Thumbs (only if >1 image) -->
                            <?php if ($images && is_array($images) && count($images) > 1): ?>
                                <div class="mt-3 swiper shop-slider-thumb" id="productThumbs">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($images as $img): ?>
                                            <div class="swiper-slide slide-smoll">
                                                <img src="assets/images/shop    /<?php echo htmlspecialchars($img); ?>" alt="Thumbnail">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Optional: show a single static thumb or nothing -->
                                <div class="mt-3 single-thumb">
                                    <img src="assets/images/shop/<?php echo htmlspecialchars($images[0] ?? 'default-thumb.jpg'); ?>" alt="Thumbnail">
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="content h24">
                            <h3 class="pb-2 primary-color"><?php echo $item["name"]; ?></h3>
                            <div class="star primary-color pb-2">
                                <span><i class="fa-solid fa-star sm-font"></i></span>
                                <span><i class="fa-solid fa-star sm-font"></i></span>
                                <span><i class="fa-solid fa-star sm-font"></i></span>
                                <span><i class="fa-solid fa-star sm-font"></i></span>
                                <span><i class="fa-solid fa-star-half-stroke sm-font"></i></span>
                            </div>
                            <h2 class="pb-3"><?php echo $item["new_price"]; ?></h2>
                            <h4 class="pb-2 primary-color">Product Description</h4>
                            <p class="text-justify mb-10"><?php echo $item["product_description"]; ?></p>

                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="details-area">
                                    <div class="category flex-wrap mt-4 d-flex py-3 bor-top bor-bottom">
                                        <h4 class="pe-3">Categories :</h4>
                                        <?php
                                        // Assuming $item['category'] contains comma-separated values
                                        if (!empty($item['category'])) {
                                            $categories = explode(',', $item['category']); // Convert string to array
                                            $count = count($categories);
                                            foreach ($categories as $index => $cat) {
                                                $cat = trim($cat); // Clean whitespace
                                                echo '<a href="shop.php?category=' . urlencode($cat) . '" class="primary-hover">' . htmlspecialchars($cat) . '</a>';
                                                if ($index < $count - 1) {
                                                    echo '<span class="px-2">|</span>';
                                                }
                                            }
                                        } else {
                                            echo '<span class="text-muted">No category assigned</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="d-flex flex-wrap py-3 bor-bottom">
                                        <h4 class="pe-3">Tags :</h4>
                                        <?php
                                        // Assuming $item['tags'] holds comma-separated values like "Fashion, Lifestyle"
                                        if (!empty($item['tags'])) {
                                            $tags = explode(',', $item['tags']);
                                            $count = count($tags);
                                            foreach ($tags as $index => $tag) {
                                                $tag = trim($tag); // remove spaces
                                                echo '<a href="shop.php?tag=' . urlencode($tag) . '" class="primary-hover">' . htmlspecialchars($tag) . '</a>';
                                                if ($index < $count - 1) {
                                                    echo '<span class="px-2">|</span>';
                                                }
                                            }
                                        } else {
                                            echo '<span class="text-muted">No tags available</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center py-3 bor-bottom">
                                        <h4 class="pe-3">Share:</h4>
                                        <div class="social-media">
                                            <a href="#" class="mx-2 primary-color secondary-hover"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#" class="mx-2 primary-color secondary-hover"><i
                                                    class="fa-brands fa-twitter"></i></a>
                                            <a href="#" class="mx-2 primary-color secondary-hover"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="#" class="mx-2 primary-color secondary-hover"><i
                                                    class="fa-brands fa-instagram"></i></a>
                                            <a href="#" class="mx-2 primary-color secondary-hover"><i
                                                    class="fa-brands fa-pinterest-p"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart-wrp py-4">
                                        <div class="cart-quantity">
                                            <form id='myform' method='POST' class='quantity' action='#'>
                                                <input type='button' value='-' class='qtyminus minus'>
                                                <input type='text' name='quantity' value='0' class='qty'>
                                                <input type='button' value='+' class='qtyplus plus'>
                                            </form>
                                        </div>
                                        <!-- <div class="discount">
                                            <input type="text" placeholder="Enter Discount Code">
                                        </div> -->
                                    </div>
                                    <a href="javascript:void(0)"
                                        onclick="addToCart(<?php echo $id; ?>)"
                                        class="d-block text-center btn-two mt-40">
                                        <span>
                                            <i class="fa-solid fa-basket-shopping pe-2"></i> Add to Cart
                                        </span>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-details area end here -->

            <!-- description review area start here -->
            <div class="shop-singe-tab">
                <ul class="nav nav-pills mb-4 bor-top bor-bottom py-2">
                    <li class="nav-item">
                        <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 pe-3 active">
                            <h4 class="text-uppercase">description</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#review" data-bs-toggle="tab" class="nav-link">
                            <h4 class="text-uppercase">reviews (4)</h4>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="description" class="tab-pane fade show active">
                        <p class="pb-4 text-justify"> <?php echo $item["description"]; ?></p>
                        <p class="pb-4 text-justify">
                    </div>
                    <div id="review" class="tab-pane fade">
                        <div class="review-wrp">
                            <section class="pt-60">
                                <div class="container">
                                    <h3 class="text-white mb-4">Customer Reviews</h3>
                                    <?php include('review-section.php'); ?>
                                </div>
                            </section>

                            <div class="comment-form">
                                <form action="routes/add-review.php" method="POST" id="reviewForm">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="w-100 mb-4 bor px-4 py-2" placeholder="Your Name*" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="w-100 mb-4 bor px-4 py-2" placeholder="Your Email*" required>
                                        </div>
                                    </div>
                                    <textarea name="message" class="w-100 mb-4 bor p-4" placeholder="Message" required></textarea>


                                    <div type="submit" class="btn-wrp">
                                        <button class="btn-one"><span>Submit Now</span></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- description review area end here -->
    </section>
    <!-- Shop single area end here -->
</main>

<?php include_once('includes/footer.php'); ?>

<!-- Back to top area start here -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Back to top area end here -->

<!-- Ajax -->




<!-- REVIEW aJAX -->
<script>
    document.getElementById('reviewForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('./routes/add-review.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message); // You can replace this with your showToast() function
                if (data.status === 'success') this.reset();
            })
            .catch(() => alert('⚠️ Something went wrong. Please try again.'));
    });
</script>




<!-- Jquery 3. 7. 1 Min Js -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<!-- Bootstrap min Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Swiper bundle min Js -->
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/swiper-single.js"></script>
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


<!-- ./shop-single.html -19:06 GMT -->

</html>