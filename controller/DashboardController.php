<?php

namespace app\controller;
use app\model\DashboardModel;
use app\model\TaskModel;
use app\view\DashboardView;
class DashboardController{
    public static function get(int $id){

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


    public static function create(){
        $dashboard_model = new DashboardModel();
        $data['action'] = '/dashboard/create/';
        if($_POST){
            if($dashboard_id = $dashboard_model->create($_POST)) {
                header('Location:/dashboard/' . $dashboard_id);
            }
        }

        DashboardView::renderForm($data);

    }

    public static function update(int $id){
        $dashboard_model = new DashboardModel();
        $data['dashboard'] = $dashboard_model->getById($id);
        $data['action'] = '/dashboard/'.$id.'/update/';

        if($_POST){
            $_POST['id'] = $id;
            $dashboard_model->update($_POST);
            header('Location:/dashboard/');
        }

        DashboardView::renderForm($data);

    }

    public static function delete(int $id){
        $dashboard_model = new DashboardModel();
        $dashboard_model->delete($id);
        header('Location:/dashboard/');
    }
}