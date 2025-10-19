<?php
session_start();
include('../routes/dbcon.php');
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please log in.']);
    exit();
}

$cart_id = intval($_POST['cart_id']);
$delete = mysqli_query($conn, "DELETE FROM cart WHERE id = $cart_id AND user_id = {$_SESSION['user_id']}");
echo json_encode($delete
    ? ['status' => 'success']
    : ['status' => 'error', 'message' => 'Failed to remove item.']);
?>
