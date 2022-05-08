<?php

namespace app\controller;
use app\view\TaskView;
use app\model\TaskModel;

class TaskController{
    public static function list():string{

        $model = new TaskModel();
        $data = $model->getAll();

        TaskView::renderList($data);
        return self::class;
    }


    public static function task($id):string{

        $model = new TaskModel();
        $data = $model->getById($id);

        TaskView::renderOne($data);
        return self::class;
    }

    public static function create():string{
         $data = $_POST;
        if($data){
            $model = new TaskModel();
            $model->create($data);
        }

        TaskView::renderCreateForm();
        return self::class;


    }

    public static function update($id):string{
        $model = new TaskModel();

        if($_POST){
            $model->update($_POST);
            header('Location:/list');
        }
        $article_data = $model->getById($id);
        TaskView::renderUpdateForm($id, $article_data);
        return self::class;


    }

    public static function delete($id){
        $model = new TaskModel();
        $model->delete($id);
        header('Location:/list');

    }
}