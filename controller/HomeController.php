<?php

namespace app\controller;

use app\view\HomeView;

class HomeController{
    public static function index():string{

        $data['isLogged'] = UserController::isAuth();

        HomeView::render($data);

        return self::class;
    }
}