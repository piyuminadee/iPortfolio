<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp2/htdocs/iPortfolio/iPortfolio/vendor/PHPMailer-master/src/Exception.php';
require 'C:/xampp2/htdocs/iPortfolio/iPortfolio/vendor/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp2/htdocs/iPortfolio/iPortfolio/vendor/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->Username   = 'piyuminadee.25@gmail.com';  // SMTP username
    $mail->Password   = '1988333$';           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;


    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('piyuminadee.25@gmail.com');  // Add your receiving email

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = nl2br($_POST['message']);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
