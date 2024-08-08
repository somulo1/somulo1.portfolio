<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $fullName = htmlspecialchars(trim($_POST['full-name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email configuration
    $to = 'mcomulosammy37@gmail.com'; // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $emailBody = "Full Name: $fullName\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
}
?>
