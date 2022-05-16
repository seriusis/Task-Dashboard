<?php

namespace app\controller;

use app\view\HomeView;

class HomeController{
    public static function index():string{

        $data['isLogged'] = UserController::isAuth();

        $data['success'] = $_SESSION['success'] ?? '';
        $data['error'] = $_SESSION['error'] ?? '';

        unset($_SESSION['success']);
        unset($_SESSION['error']);

        HomeView::render($data);

        return self::class;
    }
}