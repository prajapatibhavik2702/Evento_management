<?php

// include "../../Model\UserRegisterModel.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// require '../../Source/vendor/autoload.php';

// $to = "superevent30@gmail.com";
// $from = $_REQUEST['email'];
// $name = $_REQUEST['name'];
// $subject = $_REQUEST['subject'];
// $number = $_REQUEST['number'];
// $cmessage = $_REQUEST['message'];

// function password_reset($to, $from, $name, $subject, $number, $cmessage)
// {
//     $mail = new PHPMailer(true);
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'superevent30@gmail.com';                     //SMTP username
//     $mail->Password   = 'xhyocwrdjlyradpx';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom($from, $name);
//     $mail->addAddress($to);     //Add a recipient

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = "
//     <h3>Email : $from,</h3><br>
//     <h3>Name : $name,</h3><br>
// 	<h3>Number : $number,</h3><br>
//     <h3>Message : $cmessage</h3><br>
//     <h3>Thank You</h3>";
//     $mail->AltBody = '';
//     $mail->send();

//     header("Location: index.php");
// }


// password_reset($to, $from, $name, $subject, $number, $cmessage);
