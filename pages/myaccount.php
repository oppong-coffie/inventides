<?php
include_once('includes/header.php');

// fetch recent orders
$order_query = "SELECT * FROM orders WHERE user_id = $user_id";
$order_result = mysqli_query($conn, $order_query);

// fetch recent cart
$cart_query = "
SELECT i.name, i.new_price, c.quantity
FROM cart c
JOIN items i ON c.item_id = i.id
WHERE c.user_id = $user_id
ORDER BY c.id DESC LIMIT 5";
$cart_result = mysqli_query($conn, $cart_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Inventides</title>
    <style>
body {
  background: #0a0a23;
  color: #fff;
  font-family: 'Poppins', sans-serif;
  overflow-x: hidden;
}

/* Banner */
.page-banner {
  background: radial-gradient(circle at top, #14144b, #0a0a23 80%);
  text-align: center;
  padding: 100px 0 70px;
  color: #fff;
  box-shadow: 0 0 25px rgba(0,196,255,0.2);
}
.page-banner h2 {
  color: #00c4ff;
  font-weight: 600;
  animation: fadeInDown 1s ease;
}
.page-banner p {
  color: #bbb;
  font-size: 16px;
  animation: fadeInUp 1.2s ease;
}
@keyframes fadeInDown { from {opacity:0; transform:translateY(-20px);} to {opacity:1; transform:translateY(0);} }
@keyframes fadeInUp { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }

/* Dashboard Layout */
.account-dashboard {
  max-width: 1100px;
  margin: 80px auto;
  padding: 0 20px;
}

/* Cards */
.card {
  background: rgba(20, 20, 60, 0.95);
  border: 1px solid rgba(0,196,255,0.15);
  border-radius: 14px;
  box-shadow: 0 0 20px rgba(0,196,255,0.1);
  color: #ddd;
  transition: all 0.3s ease;
}
.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 0 25px rgba(0,196,255,0.3);
}

/* Titles */
.section-title {
  color: #00c4ff;
  border-left: 4px solid #00c4ff;
  padding-left: 10px;
  font-weight: 600;
  margin-bottom: 15px;
}

/* Table */
.table {
  color: #ddd;
  border-color: rgba(255,255,255,0.05);
}
.table th {
  color: #00c4ff;
  background: rgba(0,196,255,0.1);
}
.table tbody tr:hover {
  background-color: rgba(0,196,255,0.08);
  cursor: pointer;
  transition: 0.3s;
}

/* Logout */
.btn-logout {
  background: linear-gradient(90deg, #007bff, #00c4ff);
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 28px;
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: 0.3s;
}
.btn-logout:hover {
  background: linear-gradient(90deg, #0056b3, #00aaff);
  box-shadow: 0 0 20px rgba(0,196,255,0.5);
  transform: scale(1.05);
}

/* Tap / Glow effect */
.card:active {
  transform: scale(0.98);
  box-shadow: 0 0 15px rgba(0,196,255,0.3);
}
.table tbody tr:active {
  transform: scale(0.99);
}

/* Activity List */
ul.activity-list li {
  padding: 8px 0;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}
ul.activity-list li:last-child {
  border-bottom: none;
}
.account-header {
  background: radial-gradient(circle at top, #14144b, #0a0a23 85%);
}

.btn-logout {
  background: linear-gradient(90deg, #007bff, #00c4ff);
  color: white;
  border: none;
  border-radius: 8px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.btn-logout:hover {
  background: linear-gradient(90deg, #0056b3, #00aaff);
  box-shadow: 0 0 20px rgba(0,196,255,0.5);
  transform: scale(1.05);
}

@media (max-width: 768px) {
  .account-header .container {
    flex-direction: column;
    text-align: center;
  }
}

</style>
</head>

<body>

    <!-- HEADER -->

 

  <div class="account-dashboard">
  <section class="account-header text-center text-white py-5 page-banner text-center py-5" data-aos="fade-down">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between p-4 rounded-4"
         style="background: linear-gradient(135deg, rgba(10,10,35,0.95), rgba(0,196,255,0.1));
                border: 1px solid rgba(0,196,255,0.2);
                box-shadow: 0 0 25px rgba(0,196,255,0.15);">

      <!-- Left side: Greeting -->
      <div class="text-md-start mb-4 mb-md-0" data-aos="fade-right">
        <h3 class="fw-semibold text-info mb-1">
          Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋
        </h3>
        <p class="mb-0 text-light small">Your personalized Inventides dashboard</p>
      </div>

      <!-- Right side: Account Info + Logout -->
      <div class="text-md-end" data-aos="fade-left">
        <p class="mb-1"><strong>ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p class="mb-3"><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <form action="routes/logout.php" method="POST" class="d-inline">
          <button type="submit" class="btn-logout px-4 py-2">
            <i class="fa-solid fa-sign-out-alt me-2"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </section>

    <!-- Orders -->
    <div class="card mb-4 p-4" data-aos="fade-right">
      <h3 class="section-title">Recent Orders</h3>
      <?php if (mysqli_num_rows($order_result) > 0): ?>
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr><th>Order ID</th><th>Date</th><th>Total</th><th>Status</th></tr>
          </thead>
          <tbody>
            <?php while ($order = mysqli_fetch_assoc($order_result)): ?>
            <tr>
              <td>#<?php echo $order['id']; ?></td>
              <td><?php echo date('d M Y', strtotime($order['order_date'])); ?></td>
              <td>$<?php echo number_format($order['total_price'], 2); ?></td>
              <td>
                <span class="badge 
                  <?php echo $order['status']=='Completed'?'bg-success':
                          ($order['status']=='Pending'?'bg-warning text-dark':
                          ($order['status']=='Cancelled'?'bg-danger':'bg-info')); ?>">
                  <?php echo htmlspecialchars($order['status']); ?>
                </span>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <?php else: ?><p>No orders yet.</p><?php endif; ?>
    </div>

<!-- Cart + Activity in Flex -->
<div class="d-flex flex-wrap gap-4 justify-content-between">

  <!-- Cart -->
  <div class="card flex-fill p-4 mb-4" data-aos="fade-right" style="min-width: 48%;">
    <h3 class="section-title">Recent Cart Items</h3>
    <?php if (mysqli_num_rows($cart_result) > 0): ?>
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr><th>Product</th><th>Quantity</th><th>Price</th></tr>
          </thead>
          <tbody>
            <?php while ($cart = mysqli_fetch_assoc($cart_result)): ?>
              <tr>
                <td><?php echo htmlspecialchars($cart['name']); ?></td>
                <td><?php echo (int)$cart['quantity']; ?></td>
                <td>$<?php echo number_format($cart['new_price'], 2); ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>

  <!-- Activity -->
  <div class="card flex-fill p-4 mb-4" data-aos="fade-left" style="min-width: 48%;">
    <h3 class="section-title">Recent Activity</h3>
    <ul class="activity-list list-unstyled mb-0">
      <li>🕒 Last login: <?php echo date('d M Y, h:i A'); ?></li>
      <li>🛍️ Recent product viewed: <em>Auto-saved in session (example)</em></li>
      <li>📦 Orders viewed: <em>5 recent</em></li>
    </ul>
  </div>

</div>

  </div>
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