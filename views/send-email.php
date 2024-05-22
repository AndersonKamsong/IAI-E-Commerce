<?php

session_start();

// Sanitization
$name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.instituteinstein.org';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@instituteinstein.org';             // SMTP username
    $mail->Password = '123Asd9.@123';                     // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('contact@instituteinstein.org', 'Joe User');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    // echo 'Message has been sent';
    $_SESSION['msg'] = [true,'Email Sent Successfuly, Thank you would get back to you shortly ! '];
    header('Location:index.php#mail');
    die;
} catch (Exception $e) {
    $_SESSION['msg'] = [false,'Message could not be sent. Mailer Error: ', $mail->ErrorInfo];
    header('Location:index.php#mail');
    die;
   
}
