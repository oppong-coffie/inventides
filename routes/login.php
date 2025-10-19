<?php
session_start(); // Start session at the top

include "../routes/dbcon.php";

// Get form data
$email = $_POST["email"];
$password = $_POST["password"];

// Query user by email
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    // Verify password (if hashed)
    if ($password== $row['password']) {
        // Store user data in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        echo "<script>alert('Login successful!'); window.location.href='../';</script>";
    } else {
        echo "<script>alert('Incorrect password!'); window.location.href='../login.html';</script>";
    }
} else {
    echo "<script>alert('No account found with that email!'); window.location.href='../login.php';</script>";
}

// Close connection
mysqli_close($conn);
?>
