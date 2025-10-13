    <!-- Footer area start here -->
    <footer class="footer-area bg-image" data-background="assets/images/footer/footer-bg.jpg">
        <div class="container">
            <div class="footer__wrp pt-65 pb-65 bor-top bor-bottom">
                <div class="row g-4">
                    <!-- Technicians Support Portal -->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".1s">
                        <div class="footer__item">
                            <h4 class="footer-title">Support Services</h4>
                            <ul>
                                <li><a href="support-portal.php"><span></span>Request a Service</a></li>
                                <li><a href="pricing.php"><span></span>Service Pricing</a></li>
                                <li><a href="faq.php"><span></span>FAQs</a></li>
                                <li><a href="contact.php"><span></span>Contact Technicians</a></li>
                                <li><a href="track-request.php"><span></span>Track My Request</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Beats Selling -->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">
                        <div class="footer__item">
                            <h4 class="footer-title">Beats & Audio</h4>
                            <ul>
                                <li><a href="beats.php"><span></span>Browse Beats</a></li>
                                <li><a href="licenses.php"><span></span>License Options</a></li>
                                <li><a href="audio-preview.php"><span></span>Preview Beats</a></li>
                                <li><a href="cart.php"><span></span>My Cart</a></li>
                                <li><a href="checkout.php"><span></span>Secure Checkout</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Electronics & Quincaillaire -->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                        <div class="footer__item">
                            <h4 class="footer-title">Electronics Shop</h4>
                            <ul>
                                <li><a href="store.php"><span></span>All Products</a></li>
                                <li><a href="categories.php"><span></span>Product Categories</a></li>
                                <li><a href="quote-request.php"><span></span>Request Quotation</a></li>
                                <li><a href="cart.php"><span></span>My Orders</a></li>
                                <li><a href="checkout.php"><span></span>Checkout</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter and Dev Services -->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">
                        <div class="footer__item newsletter">
                            <h4 class="footer-title">Stay Connected</h4>
                            <div class="subscribe">
  <input type="email" id="subscriberEmail" placeholder="Enter your email" required>
  <button id="subscribeBtn"><i class="fa-solid fa-paper-plane"></i></button>
</div>

                            <ul class="mt-3">
                                <li><a href="ui-gallery.php"><span></span>UI Design Gallery</a></li>
                                <li><a href="development.php"><span></span>Website & App Dev</a></li>
                                <li><a href="tools.php"><span></span>Digital Tools</a></li>
                            </ul>
                            <div class="social-icon mt-40">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer__copy-text pt-50 pb-50">
                <a href="index.php" class="logo d-block">
                    <img src="assets/images/logo/logo.svg" alt="logo">
                </a>
                <p>&copy; Copyright <?php echo date('Y') ?> <a href="#0" class="primary-hover">INVENTEDIS</a> All Rights Reserved</p>
                <a href="#0" class="payment d-block image">
                    <img src="assets/images/icon/payment.png" alt="icon">
                </a>
            </div>
        </div>
    </footer>
    <script>
document.getElementById('subscribeBtn').addEventListener('click', function(e) {
  e.preventDefault();
  const email = document.getElementById('subscriberEmail').value.trim();

  if (!email || !email.includes('@')) {
    showToast('❌ Please enter a valid email address.', 'danger');
    return;
  }

  fetch('routes/subscribe.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `email=${encodeURIComponent(email)}`
  })
  .then(res => res.json())
  .then(data => {
    showToast(data.message || '✅ Subscription successful!');
    document.getElementById('subscriberEmail').value = '';
  })
  .catch(() => showToast('❌ Failed to subscribe.', 'danger'));
});

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

    <!-- Footer area end here -->