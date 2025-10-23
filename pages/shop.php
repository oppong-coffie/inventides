<?php
include_once('./includes/header.php');
include './routes/dbcon.php';

$sql = "SELECT * FROM items ORDER BY id DESC";
$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error running query: " . mysqli_error($conn));
}


?>

<main>
    <!-- Page banner area start here -->
    <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
        <div class="container">
            <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">shop layout 01</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                        class="fa-regular text-white fa-angle-right"></i></a>
                <span>shop layout 01</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Product area start here -->
    <section class="product-area pt-130 pb-130">
        <div class="container">
            <div class="pb-20 bor-bottom shop-page-wrp d-flex justify-content-between align-items-center mb-65">
                <p class="fw-600">Showing 1–12 of 17 results</p>
                <div class="short">
                    <select name="shortList" id="shortList">
                        <option value="0">Short by popularity</option>
                        <option value="1">E-Cigarette</option>
                        <option value="2">POP Extra</option>
                        <option value="3">Charger Kit</option>
                        <option value="4">100ml Nic</option>
                        <option value="5">Salt Juice</option>
                    </select>
                </div>
            </div>
            <div class="row g-4">

                <div class="col-xl-3 col-lg-4">
                    <div class="product__left-item sub-bg">
                        <h4 class="mb-30 left-title">Special Offer</h4>
                        <div class="image mb-30">
                            <img src="assets/images/coundown/coundown-image1.png" alt="image">
                        </div>
                        <div class="product__content p-0">
                            <h4 class="mb-15"><a class="primary-hover" href="shop-single.php">Mango Nic Salt
                                    E-Liquidt</a></h4>
                            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                            <div class="star mt-20">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="image pt-40 mb-30 bor-top mt-40">
                            <img src="assets/images/coundown/coundown-image2.png" alt="image">
                        </div>
                        <div class="product__content p-0">
                            <h4 class="mb-15"><a class="primary-hover" href="shop-single.php">Watermelon Nic
                                    Salt</a></h4>
                            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                            <div class="star mt-20">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="product__coundown pt-30 bor-top mt-40">
  <h4>Hurry Up!</h4>
  <span>offer ends in</span>
  <div class="d-flex align-items-center gap-3 flex-wrap mt-25">
    <div class="coundown-item">
      <span id="day">00</span>
      <h6>Day</h6>
    </div>
    <div class="coundown-item">
      <span id="hour">00</span>
      <h6>Hour</h6>
    </div>
    <div class="coundown-item">
      <span id="min">00</span>
      <h6>Min</h6>
    </div>
    <div class="coundown-item">
      <span id="sec">00</span>
      <h6>Sec</h6>
    </div>
  </div>
</div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row g-4">
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="product__item bor">
                                        <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                                        <a href="?page=shop-single&id=<?php echo $row['id']; ?>" class="product__image pt-20 d-block">
                                            <img class="font-image"
                                                src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>"
                                                alt="<?php echo htmlspecialchars($row['name']); ?>">
                                            <img class="back-image"
                                                src="assets/images/product/<?php echo htmlspecialchars($row['image_back']); ?>"
                                                alt="<?php echo htmlspecialchars($row['name']); ?>">
                                        </a>
                                        <div class="product__content">
                                            <h4 class="mb-15">
                                                <a class="primary-hover" href="?page=shop-single&id=<?php echo $row['id']; ?>">
                                                    <?php echo htmlspecialchars($row['name']); ?>
                                                </a>
                                            </h4>
                                            <del>$<?php echo number_format($row['old_price'], 2); ?></del>
                                            <span class="primary-color ml-10">$<?php echo number_format($row['new_price'], 2); ?></span>
                                            <div class="star mt-20">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" onclick="addToCart(<?php echo $row['id']; ?>)"
                                            class="product__cart d-block bor-top">
                                            <i class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                            <span>Add to cart</span>
                                        </a>


                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="text-center text-white">No items found.</p>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Product area end here -->
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
<script>
    function addToCart(itemId) {
        const button = event.currentTarget;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Adding...';

        fetch('routes/add-to-cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `item_id=${itemId}&quantity=1`
            })
            .then(res => res.json())
            .then(data => {
                button.innerHTML = originalText;

                if (data.status === 'success') {
                    showToast('✅ ' + data.message, 'success');
                    refreshCartTotal(); // 🔥 updates the cart total in header live
                } else if (data.status === 'error' && data.message.includes('log in')) {
                    showToast('⚠️ Please log in first!', 'warning');
                    setTimeout(() => window.location.href = 'login.php', 1500);
                } else {
                    showToast('❌ ' + data.message, 'danger');
                }
            })
            .catch(() => {
                button.innerHTML = originalText;
                showToast('⚠️ Something went wrong. Try again.', 'danger');
            });
    }


    // ✅ Update cart total in header (live)
    function refreshCartTotal() {
        fetch('routes/get-cart-total.php')
            .then(res => res.json())
            .then(data => {
                const totalElement = document.querySelector('.cart .c__one span');
                if (totalElement) {
                    totalElement.textContent = `$${data.total_price}`;
                }
            })
            .catch(err => console.error('Cart total refresh failed:', err));
    }


    // ✅ Toast Notification System
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.className = `toast-message bg-${type}`;
        document.body.appendChild(toast);

        setTimeout(() => toast.remove(), 2500);
    }


    // ✅ Prevent duplicate <style> injection
    if (!document.getElementById('toast-style')) {
        const style = document.createElement('style');
        style.id = 'toast-style';
        style.textContent = `
.toast-message {
  position: fixed;
  top: 20px;
  right: 20px;
  color: #fff;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: 500;
  z-index: 9999;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  animation: fadeInOut 2.5s ease;
}
.bg-success { background: #28a745; }
.bg-danger { background: #dc3545; }
.bg-warning { background: #ffc107; color: #111; }
@keyframes fadeInOut {
  0% { opacity: 0; transform: translateY(-10px); }
  10% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-10px); }
}`;
        document.head.appendChild(style);
    }
</script>


<script>
  // Set your offer end date here 👇
  const offerEndDate = new Date("October 20, 2025 23:59:59").getTime();

  const countdownTimer = setInterval(() => {
    const now = new Date().getTime();
    const distance = offerEndDate - now;

    if (distance <= 0) {
      clearInterval(countdownTimer);
      document.getElementById("day").textContent = "00";
      document.getElementById("hour").textContent = "00";
      document.getElementById("min").textContent = "00";
      document.getElementById("sec").textContent = "00";
      document.querySelector(".product__coundown h4").textContent = "Offer Ended";
      document.querySelector(".product__coundown span").textContent = "Stay tuned for the next deal!";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("day").textContent = days.toString().padStart(2, "0");
    document.getElementById("hour").textContent = hours.toString().padStart(2, "0");
    document.getElementById("min").textContent = minutes.toString().padStart(2, "0");
    document.getElementById("sec").textContent = seconds.toString().padStart(2, "0");
  }, 1000);
</script>



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


<!-- ./shop.html -19:03 GMT -->

</html>