<?php

namespace app\controller;
use app\view\TaskView;
use app\model\TaskModel;

class TaskController{
    public static function list():string{


        $model = new TaskModel();
        $data['items'] = $model->getAll();
        $data['isLogged'] = UserController::isAuth();


        TaskView::renderList($data);
        return self::class;
    }


    public static function task($id):string{

        $model = new TaskModel();
        $data['item'] = $model->getById($id);
        $data['isLogged'] = UserController::isAuth();

        TaskView::renderOne($data);
        return self::class;
    }

    public static function create():string{

        $data['item'] = $_POST;
        $data['isLogged'] = UserController::isAuth();
        $data['action'] = '/create';

        if($_POST){
            $model = new TaskModel();
            $model->create($_POST);
        }

        TaskView::renderCreateForm($data);
        return self::class;


    }

    public static function update($id):string{

        $model = new TaskModel();

        if($_POST){
            $model->update($_POST);
            header('Location:/list');
        }
        $data['item'] = $model->getById($id);
        $data['isLogged'] = UserController::isAuth();
        $data['action'] = '/update/'.$id;
        TaskView::renderUpdateForm($data);
        return self::class;


    }

    public static function delete($id){
        $model = new TaskModel();
        $model->delete($id);
        header('Location:/list');

    }
}