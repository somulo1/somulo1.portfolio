<?php
// Display errors for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function validateInput($input) {
    // Implement more thorough input validation here
    // For example, check the length and format of the input data
    return true; // Replace with actual validation logic
}

function sendEmail($to, $subject, $emailBody, $headers) {
    // Use a more secure email library like PHPMailer or SwiftMailer
    // For this example, we'll stick with the mail function
    if (mail($to, $subject, $emailBody, $headers)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $fullName = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate input data
    if (!validateInput($fullName) || !validateInput($subject) || !validateInput($message)) {
        echo "Invalid input data. Please try again.";
        exit;
    }

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
    $headers = "From: your-fixed-email-address@example.com\r\n";
    $headers .= "Reply-To: your-fixed-email-address@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion(); // Helps with identifying the mailer in logs

    if (sendEmail($to, $subject, $emailBody, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email. Please try again.";
    }
}
?>