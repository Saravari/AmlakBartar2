<?php

namespace App\Controllers\front;

use Rakit\Validation\Validator;
use App\Models\User;

class AuthController extends HomeController
{
    public function login()
    {
        $email = trim($_POST['email']);
        $user = User::firstWhere('email', $email);
        if($user) {
            $code = rand(10000, 99999);
            $_SESSION['code'] = $code;
            $msg = $this->sendEmail($email, $code);
            if($msg) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['name'] = $user->name;
                echo $msg;
            }
        } else {
            echo "این ایمیل موجود نیست!";
        }
    }

    public function checkCode()
    {
        $code = trim($_POST['code']);
        if($code == $_SESSION['code']) {
            $_SESSION['error'] = 0;
            $_SESSION['message'] = 0;
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function enterPassword()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $this->render('users/enterPassword');
    }

    public function checkPassword()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $validator = new Validator();
        $validation = $validator->validate($_POST + $_FILES, [
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $_SESSION['error'] = $errors['password'];
            $this->render('users/enterPassword');
            exit;
        }
        $password = trim($_POST['password']);
        $password = md5($password);
        $results = User::where('password', $password)->get();
        if($results) {
            foreach($results as $result) {
                $name = $result->name;
                $_SESSION['name'] = $name;
            }
            $_SESSION['error'] = 0;
            $this->render('users/amlakbartar');
        } else {
            $_SESSION['error'] = " کلمه عبور اشتباه است";
            $this->render('users/enterPassword');
        }
    }

    public function profile()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $users = User::where('name', $_SESSION['name'])->get();
        $this->render('users/profile');
    }

    public function profileEdit()
    {

        if (
            !empty($_POST['name'])
            && !empty($_POST['email'])
            && !empty($_POST['password'])) {

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password = md5($password);

            User::where('email', $_SESSION['email'])->update([
            'name' => $name,
            'email' => $email,
            'password' => $password ]);
            $_SESSION['message'] = 'ویرایش پروفایل با موفقیت انجام شد';
            $this->render('users/profile');
        } else {
            $_SESSION['error'] = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/profile');
        }
    }

    public function logOut()
    {
        session_destroy();
        $this->render('front/home');
    }

}
