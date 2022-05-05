<?php
namespace app\view;
class HomeView{
    public static function render(){
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/');
        $twig =  new \Twig\Environment($loader);

        echo $twig->render('home/home.twig', []);
    }
}