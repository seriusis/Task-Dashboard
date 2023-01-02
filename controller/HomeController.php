<?php

namespace app\controller;

use app\view\HomeView;
use app\model\DashboardModel;
use app\controller\UserController;

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
            $data['username'] = UserController::getName();
            $data['fullname'] = UserController::getFullName();
            $data['email'] = UserController::getEmail();
            $data['dashboards_total'] = UserController::getDashboardsTotal();
            $data['tasks_total'] = UserController::getTasksTotal();


        }

        HomeView::render($data);

        return self::class;
    }
}