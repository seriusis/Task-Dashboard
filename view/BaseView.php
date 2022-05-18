<?php
namespace app\view;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

 class BaseView{

    public static function baseRender(string $path, array $data):void{
        $loader = new FilesystemLoader(__DIR__.'/');
        $twig =  new Environment($loader);
        echo $twig->render($path, $data);
    }
}