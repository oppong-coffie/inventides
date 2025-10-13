<?php
header('Content-Type: application/json');
include('../dbcon.php');

if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);

// Check if already subscribed
$check = mysqli_query($conn, "SELECT id FROM subscribers WHERE email = '$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(['status' => 'info', 'message' => 'You are already subscribed.']);
    exit;
}

// Insert new subscriber
$query = "INSERT INTO subscribers (email, subscribed_at) VALUES ('$email', NOW())";
if (mysqli_query($conn, $query)) {
    echo json_encode(['status' => 'success', 'message' => 'Thank you for subscribing!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database error. Please try again later.']);
}
?>
