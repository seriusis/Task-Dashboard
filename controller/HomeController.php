<?php

namespace app\controller;

use app\view\HomeView;
use app\model\DashboardModel;

class HomeController{

    public static function index():string{

        $data['isLogged'] = UserController::isAuth();

        $data['success'] = $_SESSION['success'] ?? '';
        $data['error'] = $_SESSION['error'] ?? '';

        unset($_SESSION['success']);
        unset($_SESSION['error']);

        $dashboards_model = new DashboardModel();
        if(UserController::isAuth()) {
            $data['dashboards'] = $dashboards_model->getUserDashboards();
        }

        HomeView::render($data);

        return self::class;
    }
}