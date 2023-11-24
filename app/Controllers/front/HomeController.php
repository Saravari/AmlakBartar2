<?php

namespace App\Controllers\front;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Melk;
use App\Models\Image;

class HomeController extends Controller
{
    public function home()
    {

        $_SESSION['melks'] = Melk::all();
        $_SESSION['image'] = Image::all();

        $this->render('front/home');
    }
}
