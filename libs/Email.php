<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    class Email {

        public function __construct() {
            // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            
            // Load Composer's autoloader
            require 'libs/PHPMailer/src/Exception.php';
            require 'libs/PHPMailer/src/PHPMailer.php';
            require 'libs/PHPMailer/src/SMTP.php';

        }

        public function sendmail($mailInfo = []) {

            // Pass Mail info as this associative array
            // $mailInfo = [
            //     'body' => $mailbody,
            //     'subject' => 'Welcome to     Ran Aswanu',
            //     'address' => 'dimuthudhanushka8@gmail.com',
            // ];

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'your email here';                     // SMTP username
                $mail->Password   = 'Your password here';                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom('ranaswanu.sys@gmail.com', 'RanAswanu Harvest Management System');
                // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                $mail->addAddress($mailInfo['address']);               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = $mailInfo['subject'];;
            
                $mail->Body = $mailInfo['body'];
                              
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
        }

    }

