<?php
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// Rest of your PHPMailer code for sending a test email

try {
    // Send a test email
    $mail->isSMTP();
    // Set up your SMTP configuration
    // ...
    $mail->send();
    echo 'Test email sent successfully.';
} catch (Exception $e) {
    echo 'Test email could not be sent. Error: ' . $e->getMessage();
}
