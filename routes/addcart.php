<?php
if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Please login to add cart!');
        window.location.href = 'login.php';
    </script>";
    exit();
}
include '../dbcon.php';

// Get form data safely
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement
$sql = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";

// Execute query using MySQLi
$query = mysqli_query($conn, $sql);

// Check result
if ($query) {
    echo "Account created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
