<?php
include('../dbcon.php');
header('Content-Type: application/json');

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize input
$id = mysqli_real_escape_string($conn, $_POST['id'] ?? '');

// Validate input
if (empty($id)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing user ID.']);
    exit;
}

// Check if user exists
$check = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
if (mysqli_num_rows($check) === 0) {
    echo json_encode(['status' => 'error', 'message' => 'User not found.']);
    exit;
}

// Attempt deletion
$delete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

if ($delete) {
    echo json_encode(['status' => 'success', 'message' => '✅ User deleted successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => '❌ Failed to delete user.']);
}

mysqli_close($conn);
?>
