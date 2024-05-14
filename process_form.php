<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Path to PHPMailer autoload.php file
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Send email
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'aspmx.l.google.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lhfloresr5@gmail.com'; // SMTP username
        $mail->Password = 'Hazael22032005_.';     // SMTP password
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption
        $mail->Port = 25;                // TCP port to connect to

        // Recipients
        $mail->setFrom('your@example.com', 'Your Name');
        $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add a recipient

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
        echo 'Thank you for your message. I will get back to you soon!';
    } catch (Exception $e) {
        echo 'Oops! Something went wrong. Please try again later.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>