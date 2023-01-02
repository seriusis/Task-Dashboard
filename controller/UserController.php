<?php

namespace app\controller;
use app\model\UserModel;

class UserController{
    public static function isAuth():bool{
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_password'])){
            return true;
        }else{
            return  false;
        }
    }

    public static function getFullName():string{
        if (self::isAuth()){
            $userModel = new UserModel();
            return $userModel->getFullName();
        }
        return  '';
    }

    public static function getName():string{
        if (self::isAuth()){
            $userModel = new UserModel();
            return $userModel->getName();
        }
        return  '';
    }

    public static function getEmail():string{
        if (self::isAuth()){
            $userModel = new UserModel();
            return $userModel->getEmail();
        }
        return  '';
    }

    public static function getDashboardsTotal():int{
        if (self::isAuth()){
            $userModel = new UserModel();
            return $userModel->getDashboardsTotal();
        }
        return  0;
    }

    public static function getTasksTotal():int{
        if (self::isAuth()){
            $userModel = new UserModel();
            return $userModel->getTasksTotal();
        }
        return  0;
    }


}
