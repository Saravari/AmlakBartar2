<?php

namespace App\Controllers\front;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail($to, $code)
    {

        $mail = new PHPMailer(true);      
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'be7a99883e0d77';
        $mail->Password = 'cfa53d68dcdf8e';
        $mail->SMTPSecure = "TLS";
        $mail->Port = 2525;

        $mail->setFrom('amlakbartar@code.com', 'Code');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Verification code';
        $mail->Body = " your Verification code: $code";
        try {
            $mail->send();
            $msg = 'sended email';
        } catch (Exception $e) { 
            $msg = 'error: '.$e->getMessage();
        }

        return $msg;
    }
}