<?php

namespace app\view;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardView{
    public static function renderOne($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('dashboard/one.twig', $data);
    }

    public static function renderAll($data){
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render('dashboard/list.twig', $data);
    }
}