<?php

namespace app\controller;

class UserController{
    public static function isAuth():bool{
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_password'])){
            return true;
        }else{
            return  false;
        }
    }
}
