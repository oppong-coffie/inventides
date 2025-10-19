<?php
include('../dbcon.php');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id'])) {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
  exit;
}

$id = intval($_POST['id']);
$delete = mysqli_query($conn, "DELETE FROM reviews WHERE id = $id");

if ($delete) {
  echo json_encode(['status' => 'success', 'message' => '✅ Review deleted successfully!']);
} else {
  echo json_encode(['status' => 'error', 'message' => '❌ Failed to delete review.']);
}
?>
