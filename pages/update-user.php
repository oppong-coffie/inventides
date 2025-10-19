<?php
include('../dbcon.php');
header('Content-Type: application/json');

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Collect and sanitize inputs
$id = mysqli_real_escape_string($conn, $_POST['id'] ?? '');
$name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
$email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validate required fields
if (empty($id) || empty($name) || empty($email)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
    exit;
}

// Check if user exists
$user_check = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
if (mysqli_num_rows($user_check) === 0) {
    echo json_encode(['status' => 'error', 'message' => 'User not found.']);
    exit;
}

// Update query logic
    $query = "UPDATE users SET `username`='$name', `email`='$email', `password`='$password' WHERE id='$id'";


// Execute update
if (mysqli_query($conn, $query)) {
    echo json_encode(['status' => 'success', 'message' => '✅ User updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => '❌ Database update failed.']);
}

mysqli_close($conn);
?>
