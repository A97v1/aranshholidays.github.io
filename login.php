<?php
// Simple hardcoded login system (without database)

// Get values from form
$email = $_POST['email'];
$password = $_POST['password'];

// Replace these with your real credentials
$valid_email = "admin@aranshholidays.com";
$valid_password = "123456";  // You can change this

if ($email === $valid_email && $password === $valid_password) {
    // Login success
    echo "<h2>✅ Welcome, $email!</h2>";
    echo "<p>Login successful. Redirecting to dashboard...</p>";
    // Optional: redirect after 2 seconds
    header("refresh:2;url=index.html");
} else {
    // Login failed
    echo "<h2>❌ Invalid email or password</h2>";
    echo "<a href='login.html'>Try Again</a>";
}
?>
