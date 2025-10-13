<?php
// Database configuration
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "inventides";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: uncomment this to confirm connection during testing
// echo "Connected successfully!";
?>
