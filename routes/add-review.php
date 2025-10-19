<?php
include('./dbcon.php');
header('Content-Type: application/json');

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// Collect and sanitize inputs
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => '⚠️ Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => '⚠️ Invalid email address.']);
    exit;
}

// Prepare and insert securely
$stmt = $conn->prepare("INSERT INTO reviews (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => '✅ Thank you for your review!']);
} else {
    echo json_encode(['status' => 'error', 'message' => '❌ Failed to save your review. Please try again later.']);
}

$stmt->close();
$conn->close();
?>
