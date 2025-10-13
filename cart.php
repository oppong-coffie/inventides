<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Please login to see cart!');
        window.location.href = 'login.php';
    </script>";
    exit();
}

$user_id = $_SESSION['user_id'];

include('./dbcon.php');

// Fetch cart items with product details
$query = "
    SELECT c.id AS cart_id, c.quantity, i.name, i.new_price, i.image_front
    FROM cart c
    JOIN items i ON c.item_id = i.id
    WHERE c.user_id = $user_id
";

$result = mysqli_query($conn, $query);
$total = 0;


include_once('includes/header.php'); 
?>

    <main>
        <!-- Page banner area start here -->
        <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner.jpg">
            <div class="container">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Cart Page</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.php" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>Cart</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- cart page area start here -->
        <section class="cart-page pt-130 pb-130">
            <div class="container">

            <div class="shopping-cart radius-10 bor sub-bg">
    <div class="column-labels py-3 px-4 d-flex justify-content-between align-items-center fw-bold text-white text-uppercase">
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
        <label class="product-line-price">Total</label>
        <label class="product-removal">Edit</label>
    </div>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php $line_total = $row['new_price'] * $row['quantity']; $total += $line_total; ?>
            <div class="product p-4 bor-top bor-bottom d-flex justify-content-between align-items-center">
                <div class="product-details d-flex align-items-center">
                    <img src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>" alt="image">
                    <h4 class="ps-4 text-capitalize"><?php echo htmlspecialchars($row['name']); ?></h4>
                </div>
                <div class="product-price">$<?php echo number_format($row['new_price'], 2); ?></div>
                <div class="product-quantity">
                    <input type="number" value="<?php echo $row['quantity']; ?>" min="1"
                        onchange="updateQuantity(<?php echo $row['cart_id']; ?>, this.value)">
                </div>
                <div class="product-line-price">$<?php echo number_format($line_total, 2); ?></div>
                <div class="product-removal">
                    <button class="remove-product" onclick="removeFromCart(<?php echo $row['cart_id']; ?>)">
                        <i class="fa-solid fa-x heading-color"></i>
                    </button>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-center py-5 text-white">🛒 Your cart is empty.</p>
    <?php endif; ?>

    <div class="totals">
        <div class="totals-item theme-color float-end mt-20">
            <span class="fw-bold text-uppercase py-2">Cart Total =</span>
            <div class="totals-value d-inline py-2 pe-2" id="cart-subtotal">$<?php echo number_format($total, 2); ?></div>
        </div>
    </div>
</div>
            </div>
        </section>
        <!-- cart page area end here -->
    </main>

    <?php include_once('includes/footer.php'); ?>

    <!-- Back to top area start here -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top area end here -->

    <!-- AJAX -->
    <script>
function updateQuantity(cartId, qty) {
  if (qty < 1) return;

  fetch('routes/update-cart.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `cart_id=${cartId}&quantity=${qty}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      showToast('✅ Quantity updated!');
      setTimeout(() => location.reload(), 700);
    } else {
      showToast('❌ ' + data.message, 'danger');
    }
  });
}

function removeFromCart(cartId) {
  if (!confirm('Remove this item from your cart?')) return;

  fetch('routes/remove-cart.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `cart_id=${cartId}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      showToast('🗑️ Item removed!');
      setTimeout(() => location.reload(), 700);
    } else {
      showToast('❌ ' + data.message, 'danger');
    }
  });
}

function showToast(message, type='success') {
  const toast = document.createElement('div');
  toast.textContent = message;
  toast.className = `toast-message bg-${type}`;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 2500);
}

const style = document.createElement('style');
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
@keyframes fadeInOut {
  0% { opacity: 0; transform: translateY(-10px); }
  10% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-10px); }
}`;
document.head.appendChild(style);
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


<!-- ./cart.html -19:06 GMT -->
</html>