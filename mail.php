
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'mailer/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true); 


    //Server settings
 //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'localhost';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = false;     
 $mail->SMPTautoTLS= false;                              //Enable SMTP authentication
 $mail->Username   = 'mounir2013b@gmail.com';                     //SMTP username
 $mail->Password   = 'mnrbneder2022';                               //SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port = 25;                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
// Content
$mail->isHTML(true);  
$mail->CharSet = "UTF-8";




    