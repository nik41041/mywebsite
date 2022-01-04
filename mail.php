<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpmail/exception.php');
require('phpmail/SMTP.php');
require('phpmail/PHPMailer.php');


if(isset($_POST['submit'])){
  $name= $_POST['ename'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $message= $_POST['message'];

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'thisiscontactme.noreply@gmail.com';                     //SMTP username
    $mail->Password   = 'Hey12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('thisiscontactme.noreply@gmail.com', 'Portfolio Website');
    $mail->addAddress('heyitsnik4@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Form Portfolio Website';
    $mail->Body    = "Name = ". $name . "<br><br>  Email = " . $email . "<br><br>  Phone = " . $phone . "<br><br>  Message =" . $message;


    $mail->send();
    echo "<script>alert('Message has been sent')</script>";
    } catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }

}

?>
