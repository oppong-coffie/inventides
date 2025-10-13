<?php
session_start();
include('../dbcon.php');

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Get POST data (or GET, depending on your frontend)
if (!isset($_POST['item_id']) || !isset($_POST['quantity'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing item ID or quantity']);
    exit();
}

$item_id = intval($_POST['item_id']);
$quantity = intval($_POST['quantity']);

// Validate item exists
$itemCheck = mysqli_query($conn, "SELECT id FROM items WHERE id = $item_id");
if (mysqli_num_rows($itemCheck) == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Item not found']);
    exit();
}

// Check if item already in cart for this user
$existing = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = $user_id AND item_id = $item_id");

if (mysqli_num_rows($existing) > 0) {
    // Update quantity
    $update = mysqli_query($conn, "UPDATE cart SET quantity = quantity + $quantity WHERE user_id = $user_id AND item_id = $item_id");
    if ($update) {
        echo json_encode(['status' => 'success', 'message' => 'Quantity updated']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
    }
} else {
    // Insert new record
    $insert = mysqli_query($conn, "INSERT INTO cart (user_id, item_id, quantity) VALUES ($user_id, $item_id, $quantity)");
    if ($insert) {
        echo json_encode(['status' => 'success', 'message' => 'Item added to cart']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database insert failed']);
    }
}
?>
