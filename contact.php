<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set the recipient email address where you want to receive the emails
    $to = "vass.bence14@gmail.com";

    // Set the email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";

    // Compose the email content
    $email_content = "<h2>New Contact Form Submission</h2>";
    $email_content .= "<p><strong>Name:</strong> $name</p>";
    $email_content .= "<p><strong>Email:</strong> $email</p>";
    $email_content .= "<p><strong>Subject:</strong> $subject</p>";
    $email_content .= "<p><strong>Message:</strong> $message</p>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        header("Location: index.html"); // Redirect to a thank you page
        exit();
    } else {
        // Email sending failed
        echo "Something went wrong. Please try again later.";
    }
}
?>
