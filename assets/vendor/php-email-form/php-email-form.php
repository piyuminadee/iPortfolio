<?php
// Replace with your actual email address
$receiving_email_address = 'piyuminadee.25@gmail.com';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = strip_tags(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST['subject']));
    $message = strip_tags(trim($_POST['message']));

    // Check if the required fields are filled
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo 'Please fill in all fields.';
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address.';
        exit;
    }

    // Construct the email
    $to = $receiving_email_address;
    $headers = "From: $name <$email>";
    $email_subject = "New contact form submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'Thank you! Your message has been sent.';
    } else {
        echo 'Sorry, something went wrong. Please try again later.';
    }
} else {
    echo 'There was a problem with your submission. Please try again.';
}
?>
