<?php
session_start();
include('../dbcon.php');

if (!isset($_SESSION['user_id'])) {
    exit('<p class="text-center py-5 text-white">⚠️ Please log in to view your cart.</p>');
}

$user_id = $_SESSION['user_id'];

// ✅ Fetch cart items with product info
$query = "
    SELECT 
        c.id AS cart_id, 
        c.quantity, 
        i.name, 
        i.new_price, 
        i.image_front
    FROM cart c
    JOIN items i ON c.item_id = i.id
    WHERE c.user_id = $user_id
";

$result = mysqli_query($conn, $query);

if (!$result) {
    exit('<p class="text-danger text-center">Database query failed: ' . mysqli_error($conn) . '</p>');
}

$total = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $line_total = $row['new_price'] * $row['quantity'];
        $total += $line_total;
        ?>
        <div class="product p-4 bor-top bor-bottom d-flex justify-content-between align-items-center fadeIn">
            <div class="product-details d-flex align-items-center">
                <img src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>" alt="image" width="70">
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
        <?php
    }
} else {
    echo '<p class="text-center py-5 text-white">🛒 Your cart is empty.</p>';
}
?>
