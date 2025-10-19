<?php
include('./routes/dbcon.php');

// Fetch latest 6 products safely using prepared statements
$query = $conn->prepare("SELECT id, name, new_price, old_price, image_front FROM items ORDER BY id DESC LIMIT 6");
$query->execute();
$result = $query->get_result();

include_once('includes/header.php');
?>

<main>
  <!-- Dynamic Page Routing -->
  <?php
  $allowed_pages = ['home', 'shop', 'cart', 'checkout', 'login', 'register', 'myaccount', 'error',  'about', 'contact', 'support', 'music', 'shop-single'];

  $page = $_GET['page'] ?? 'home';
  $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page); // sanitize input

  if (in_array($page, $allowed_pages)) {
      include("pages/$page.php");
  } else {
      include('pages/error.php');
  }
  ?>
</main>

<?php include_once('includes/footer.php'); ?>

<!-- Back to top button -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- AJAX and Notifications -->
<script>
    async function addToCart(itemId) {
        const button = event.currentTarget;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Adding...';

        try {
            const response = await fetch('routes/add-to-cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `item_id=${itemId}&quantity=1`
            });
            const data = await response.json();
            button.innerHTML = originalText;

            if (data.status === 'success') {
                showToast(`✅ ${data.message}`, 'success');
                refreshCartTotal();
            } else if (data.status === 'error' && data.message.includes('log in')) {
                showToast('⚠️ Please log in first!', 'warning');
                setTimeout(() => window.location.href = '?page=login', 1500);
            } else {
                showToast(`❌ ${data.message}`, 'danger');
            }
        } catch (error) {
            button.innerHTML = originalText;
            showToast('⚠️ Something went wrong. Try again.', 'danger');
        }
    }

    // Update cart total dynamically
    async function refreshCartTotal() {
        try {
            const res = await fetch('routes/get-cart-total.php');
            const data = await res.json();
            const totalElement = document.querySelector('.cart .c__one span');
            if (totalElement) totalElement.textContent = `$${data.total_price}`;
        } catch {
            console.error('Cart total refresh failed');
        }
    }

    // Toast Notification
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.className = `toast-message bg-${type}`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 2500);
    }

    // Toast styles
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

<!-- JS Libraries -->
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
