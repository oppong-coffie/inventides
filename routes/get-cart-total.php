<?php
session_start();
include('../dbcon.php');

$total_price = 0;

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $result = mysqli_query($conn, "
    SELECT c.quantity, i.new_price
    FROM cart c
    JOIN items i ON c.item_id = i.id
    WHERE c.user_id = $user_id
  ");

  while ($row = mysqli_fetch_assoc($result)) {
    $total_price += $row['quantity'] * $row['new_price'];
  }
}

echo json_encode(['total_price' => number_format($total_price, 2)]);
?>
