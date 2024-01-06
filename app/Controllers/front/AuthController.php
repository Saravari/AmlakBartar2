<?php

namespace App\Controllers\front;

use App\Controllers\front\EmailController as Email;
use Rakit\Validation\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $jsonData = [];
        $email = trim($_POST['email']);
        $user = User::firstWhere('email', $email);
        if($user) {
            $code = rand(10000, 99999);
            $_SESSION['code'] = $code;
            $result = Email::sendEmail($email, $code);
           if($result == 'sended email') {
                $_SESSION['user_id'] = $user->id;
                $jsonData['result'] = true;
                $jsonData['msg'] = 'کد تایید به ایمیل شما فرستاده شد';
                $msg = json_encode($jsonData);
            }else{
                $jsonData['result'] = false;
                $jsonData['msg'] = 'خطایی رخ داده است: '.$result; 
                $msg = json_encode($jsonData);  
            }
        } else {
            $jsonData['msg'] = 'این ایمیل موجود نیست!';
            $msg = json_encode($jsonData);
        }
        echo $msg;
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

    /*public function enterPassword()
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
    }*/

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
        header("location:/");
    }

}