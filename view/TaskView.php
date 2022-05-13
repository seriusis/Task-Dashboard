<?php
namespace app\view;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TaskView{
    public static function renderList($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/list.twig', $data);
    }

    public static function renderOne($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/one.twig', $data);
    }

    public static function renderUpdateForm($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/form.twig', $data);
    }

    public static function renderCreateForm($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/form.twig', $data);
    }
}