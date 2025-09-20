<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email settings
    $to = "your-email@example.com"; // <-- change this to your email
    $subject = "New Contact Form Submission from Aransh Holidays";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: success.php"); // Redirect to success page
        exit;
    } else {
        header("Location: failure.php"); // Redirect to failure page
        exit;
    }
} else {
    echo "❌ Invalid request.";
}
?>
