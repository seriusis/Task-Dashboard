<?php

namespace app\controller;
use app\view\RegisterFormView;
use app\model\UserModel;

class RegisterController{

    public static $errors = [];

    public static function index(){
        $data['isLogged'] = UserController::isAuth();

        $data['success'] = $_SESSION['success'] ?? '';
        $data['error'] = $_SESSION['error'] ?? '';

        unset($_SESSION['success']);
        unset($_SESSION['error']);


        RegisterFormView::render($data);
    }

    public static function register(){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        if(!self::validate($name, $email, $password)){
            $_SESSION['error'] = self::getErrors();
            header('Location:/register');
        }else{

            $model = new UserModel();
            $model->register($name, $lastname,$email,$password);

            $_SESSION['success'] = 'Your account was created! You can log in!';

            header('Location:/');
        }

    }

    public static function validate($name, $email, $password):bool{
        if(mb_strlen($name) < 3) self::setError('Wrong name!');
        if(strlen($password) < 6) self::setError('Your password is bad!');

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) self::setError('Wrong email!');
        $model = new UserModel();
        if($model->isExist($email)) self::setError('Email is already registered!');

        return !boolval(self::getErrors());
    }

    public static function setError($error){
        self::$errors[] = $error;
    }

    public static function getErrors():string{
        return implode(PHP_EOL,self::$errors);
    }
}