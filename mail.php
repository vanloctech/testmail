<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 9/5/2018 10:47 PM
 */
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer.php';
require '../SMTP.php';
require '../Exception.php';
//require 'class.phpmailer.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vanloctechdemo@gmail.com';                // SMTP username
$mail->Password = 'jlaivyujimshsshu';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'vanloctechdemo@gmail.com';
$mail->FromName = 'Loc Nguyen Demo';
$mail->AddAddress('vanloctech@gmail.com', 'Loc Nguyen Tech');  // Add a recipient
$mail->AddAddress('loc.nguyen@erabit.co');               // Name is optional

$mail->IsHTML(true);                         // Set email format to HTML

$mail->Subject = 'Loc send mail';
//$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
}

echo 'Message has been sent';
