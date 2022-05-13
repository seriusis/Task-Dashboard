<?php
namespace app\controller;
use app\model\UserModel;

class AuthController{

    public static function login(){
        if($_POST) {
            $model = new UserModel();
            $auth = $model->getAuth($_POST['email'], $_POST['password']);
            if($auth){
                $_SESSION['user_id'] = $auth->id;
                $_SESSION['user_email'] = $auth->email;
                $_SESSION['user_password'] = md5($auth->password);
            }

            header('Location:/');
        }
    }

    public static function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);

        header('Location:/');
    }



}