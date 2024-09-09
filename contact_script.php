<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'royalcoastacademy21@gmail.com';
    $mail->Password   = 'uaspiwsyvxmvvtpj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Get sender email and name from the form
    $senderEmail = htmlspecialchars($_POST['email']);
    $senderName = htmlspecialchars($_POST['name']);

    // Set the "From" email to the sender's email
    $mail->setFrom($senderEmail, $senderName); 

    // Set the "Reply-To" email to the sender's email
    $mail->addReplyTo($senderEmail, $senderName);

    // Set the recipient email address
    $mail->addAddress('royalcoastacademy21@gmail.com'); 

    // Content
    $mail->isHTML(true);
    $mail->Subject = "Update from " . $senderName;

    // Modern styled HTML email body
    $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 20px;
                }
                .email-container {
                    background-color: #fdfdfd;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    max-width: 600px;
                    margin: auto;
                }
                .email-header {
                    background-color: #671470;
                    color: #ffffff;
                    padding: 10px;
                    border-radius: 8px 8px 0 0;
                    text-align: center;
                    font-size: 24px;
                }
                .email-content {
                    padding: 20px;
                }
                .email-content p {
                    font-size: 16px;
                    color: #333333;
                    line-height: 1.5;
                }
                .email-content .label {
                    font-weight: bold;
                    color: #555555;
                }
                .email-footer {
                    text-align: center;
                    padding: 20px;
                    background-image: url("images/substackheader.png");
                    background-size: cover;
                    color: #ffffff;
                    font-size: 12px;
                    border-radius: 0 0 8px 8px;
                }
                .email-footer p {
                    margin: 0;
                    padding: 10px;
                    background-color: rgba(0, 0, 0, 0.5); /* Fallback for text readability */
                }
            </style>
        </head>
        <body>
            <div class="email-container">
                <div class="email-header">
                    New Message from ' . $senderName . '
                </div>
                <div class="email-content">
                    <p><span class="label">Name:</span> ' . $senderName . '</p>
                    <p><span class="label">Email:</span> ' . $senderEmail . '</p>
                    <p><span class="label">Message:</span><br>' . nl2br(htmlspecialchars($_POST['message'])) . '</p>
                </div>
                <div class="email-footer">
                    <p>&copy; ' . date('Y') . ' Royal Coast Academy. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
    ';

    $mail->send();

    // Redirect with success parameter
    header("Location: contact.php?success=true");
    exit();
} catch (Exception $e) {
    header("Location: contact.php?success=false");
    exit();
}
?>
