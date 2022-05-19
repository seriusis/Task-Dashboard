<?php

namespace app\controller;
use app\view\TaskView;
use app\model\TaskModel;

class TaskController{

    public static function task($dashboard_id, $task_id):string{

        $model = new TaskModel();
        $data['item'] = $model->getById($task_id);
        $data['isLogged'] = UserController::isAuth();

        TaskView::renderOne($data);
        return self::class;
    }

    public static function create($dashboard_id):string{

        $data['item'] = $_POST;
        $data['isLogged'] = UserController::isAuth();
        $data['action'] = '/dashboard/'.$dashboard_id.'/task/create';

        if($_POST){
            $_POST['dashboard_id'] = $dashboard_id;
            $model = new TaskModel();
            $model->create($_POST);
            header('Location:/dashboard/'.$dashboard_id);
        }

        TaskView::renderCreateForm($data);
        return self::class;


    }

    public static function update($dashboard_id, $task_id):string{

        $model = new TaskModel();

        if($_POST){
            $_POST['id'] = $task_id;
            $model->update($_POST);
            header('Location:/dashboard/'.$dashboard_id);
        }
        $data['item'] = $model->getById($task_id);
        $data['isLogged'] = UserController::isAuth();
        $data['action'] = '/dashboard/'.$dashboard_id.'/task/'.$task_id.'/update/';
        TaskView::renderUpdateForm($data);
        return self::class;


    }

    public static function delete($dashboard_id, $task_id){
        $model = new TaskModel();
        $model->delete($task_id);
        header('Location:/dashboard/'.$dashboard_id);

    }
}