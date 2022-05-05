<?php
namespace app\view;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TaskView{
    public static function renderList($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/list.twig', [
            'items' => $data]
        );
    }

    public static function renderOne($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/one.twig', ['item' => $data]);
    }

    public static function renderUpdateForm($id, $data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/form.twig', ['action' => '/update/'.$id,'item' => $data]);
    }

    public static function renderCreateForm(){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('task/form.twig', ['action' => '/create']);
    }
}