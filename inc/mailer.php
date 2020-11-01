<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require_once 'config.php';
$mail = new PHPMailer(true);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receiver       = $email;
    $senderName     = $_POST['name'];
    $senderEmail    = $_POST['email'];
    $msgSubject     = $_POST['subject'];
    $msg            = $_POST['message'];
    //
    $message        = array();

    if(empty($senderName)) {
        $message['status'] = 0;
        $message['msg']    = "Please enter your name";
    } elseif(empty($senderEmail)) {
        $message['status'] = 0;
        $message['msg']    = "Please enter your email";
    } elseif(!filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
        $message['status'] = 0;
        $message['msg']    = "This email is not vaild";
    } elseif(empty($msgSubject)) {
        $message['status'] = 0;
        $message['msg']    = "Subject can't be empty";
    } elseif(empty($msg)) {
        $message['status'] = 0;
        $message['msg']    = "Message can't be empty";
    }

    if(empty($message)) {
        try {
            //Recipients
            $mail->setFrom($senderEmail, $senderName);
            $mail->addAddress($receiver, $senderName);
            $mail->addReplyTo($receiver, $senderName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $msgSubject;
            $mail->Body    = "Name: <strong>$senderName</strong>";
            $mail->Body    .= "<br>Email: <strong>$senderEmail</strong>";
            $mail->Body    .= "<br>Subject: <strong>$msgSubject</strong>";
            $mail->Body    .= "<br>Message: <br> <strong>$msg</strong>";
            $mail->AltBody = "Name: $senderName, Email: $senderEmail, Subject: $msgSubject, Message: $msg";

            $mail->send();
            $message['status'] = 1;
            $message['msg']    = "Your message has been sent :)";
            if ($autoReply) {
                $reply = new PHPMailer(true);
                $reply->setFrom($sentFrom, $senderName);
                $reply->addAddress($senderEmail, $senderName);
                $reply->addReplyTo($sentFrom, $senderName);
                $reply->isHTML(true);
                $reply->Subject = $msgSubject . " - Auto Reply";
                $reply->Body    = "<h3 style='text-align: center; color: #212121'>$replyMsg</h3>";
                $reply->AltBody = "$replyMsg";
                $reply->send();
            }
        } catch (Exception $e) {
            $message['status'] = 0;
            $message['msg']    = "We Couldn't receive your message because: {$mail->ErrorInfo}";
        }
    }

    echo json_encode($message);
}


