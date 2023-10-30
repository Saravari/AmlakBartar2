<?php

namespace App\Controllers\front;

use Jenssegers\Blade\Blade as LaravelBlade;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Melk;
use App\Models\Image;




class HomeController
{
    public  function render($template, $data = [])
    {
        echo $this->returnTemplate($template, $data);
    }

    public  function returnTemplate($template, $data = [])
    {
        $blade = new LaravelBlade('./resources/views/', 'cache');
        $file = './resources/views/' . $template . '.blade.php';
        if (file_exists($file)) {
            return $blade->render($template, $data);
        } else {
            $template = 'errors/404';
            return $blade->render($template, $data);
        }
    }

    function loggedIn()
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
            return true;
        }else {
            return false;
        }
    }

    function home()
    {
        
        $_SESSION['melks'] = Melk::all();
        $_SESSION['image'] = Image::all();

        $this->render('front/home');
    }

    public  function sendEmail($to, $code)
    {
        
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'be7a99883e0d77';
        $mail->Password = 'cfa53d68dcdf8e';
        $mail->SMTPSecure = "TLS";
        $mail->Port = 2525;
        
        $mail->setFrom('amlakbartar@code.com','Code');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Verification code';
        $mail->Body = " your Verification code: $code";
        try {
            $mail->send();
            $msg = 'true';
            } catch (Exception $e) {
            $msg = 'false';
        }

        return $msg;
    }
}