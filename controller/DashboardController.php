<?php

namespace app\controller;
use app\model\DashboardModel;
use app\model\TaskModel;
use app\view\DashboardView;
class DashboardController{
    public static function get($id){

        $data['isLogged'] = UserController::isAuth();

        $dashboard_model = new DashboardModel();
        $data['dashboard'] = $dashboard_model->getById($id);

        $task_model = new TaskModel();
        $data['items'] = $task_model->getByDashboard($id);

        DashboardView::renderOne($data);
    }

    public static function list(){
        $data['isLogged'] = UserController::isAuth();


        $dashboard_model = new DashboardModel();
        $data['dashboards'] = $dashboard_model->getUserDashboards();

        DashboardView::renderAll($data);
    }
}