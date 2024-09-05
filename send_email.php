<?php
// Display errors for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $fullName = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Format the email body
    $emailBody = "Full Name: " . htmlspecialchars($fullName) . "\n";
    $emailBody .= "Email Address: " . htmlspecialchars($email) . "\n";
    $emailBody .= "Subject: " . htmlspecialchars($subject) . "\n\n";
    $emailBody .= "Message:\n" . htmlspecialchars($message);

    // Send the email
    $to = "mcomulosammy37@gmail.com"; // Replace with your email address
    $headers = "From: " . htmlspecialchars($email) . "\r\n";
    $headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion(); // Helps with identifying the mailer in logs

    if (mail($to, htmlspecialchars($subject), $emailBody, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email. Please try again.";
    }
}
?>
