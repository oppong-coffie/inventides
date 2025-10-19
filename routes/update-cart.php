<?php
session_start();
include('../routes/dbcon.php');
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please log in.']);
    exit();
}

$cart_id = intval($_POST['cart_id']);
$quantity = intval($_POST['quantity']);

if ($quantity < 1) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid quantity.']);
    exit();
}

$update = mysqli_query($conn, "UPDATE cart SET quantity = $quantity WHERE id = $cart_id AND user_id = {$_SESSION['user_id']}");
echo json_encode($update
    ? ['status' => 'success']
    : ['status' => 'error', 'message' => 'Failed to update.']);
?>
