<?php

namespace App\Controllers\front;

use Jenssegers\Blade\Blade as LaravelBlade;


class Controller
{
    public function render($template, $data = [])
    {
        echo $this->returnTemplate($template, $data);
    }

    public function returnTemplate($template, $data = [])
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

    public function loggedIn()
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
