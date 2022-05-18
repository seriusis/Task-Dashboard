<?php
namespace app\view;

class TaskView extends BaseView {

    public static function renderOne(array $data):void{
        parent::baseRender('task/one.twig', $data);
    }

    public static function renderUpdateForm(array $data):void{
         parent::baseRender('task/form.twig', $data);
    }

    public static function renderCreateForm(array $data):void{
         parent::baseRender('task/form.twig', $data);
    }
}