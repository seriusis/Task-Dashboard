<?php

namespace app\controller;

use app\view\HomeView;

class HomeController{


    public static function index():string{
        HomeView::render();
        return self::class;
    }
}