<?php

namespace app\view;

class FormView{
    public static function render(){
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/form');
        $twig =  new \Twig\Environment($loader);

        echo $twig->render('form.twig', ['action' => '/success','btn_submit' => 'Submit']);
    }
}