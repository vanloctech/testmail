<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 9/6/2018 12:10 PM
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

//ob_start();
//include 'template.php';
//$body = ob_get_clean();

$email_vars = array(
    'name' => 'Nguyen Van Loc',
    'phone' => '01655609955',
);

$body = file_get_contents('template.php');

if(isset($email_vars)){
    foreach($email_vars as $k=>$v){
        $body = str_replace('{'.strtoupper($k).'}', $v, $body);
    }
}

//try {
    //Server settings
//    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->IsSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
    $mail->Port = 587;                                    // Set the SMTP port
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'vanloctechdemo@gmail.com';                // SMTP username
    $mail->Password = 'jlaivyujimshsshu';                  // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('vanloctechdemo@gmail.com', 'Mailer');
    $mail->addAddress('vanloctech@gmail.com', 'Loc Nguyen Tech');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('loc.nguyen@erabit.co', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('erabit/test_mail.rar');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bảng báo giá';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
}

echo 'Message has been sent';
//    $mail->send();
//    echo 'Message has been sent';
//} catch (Exception $e) {
//    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
//}
?>
